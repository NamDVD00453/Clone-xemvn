<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new \GuzzleHttp\Client();
        $urls = array(
            'https://data.baomoi.com/api/v2.0/video/byzone?apikey=ee7b8c7c7019f1b5c0674d41b125faf7&client_version=18.09.03&ctime=%20%20%201538380996&deviceName=iPhone7Plus&fields=title%2Credirect%2Cdate%2CcontentTypes%2Curl%2CoriginalUrl%2CpublisherId%2CpublisherName%2CpublisherIcon%2CvideoChannelId%2CvideoChannelName%2CparentVideoChannelId%2CparentVideoChannelName%2CavatarUrl%2CavatarWidth%2CavatarHeight%2Cdescription%2Ctags%2CtotalImages%2Cimages%2CtotalComments%2CvideoChannelName%2Cbody%2CshareUrl&gy=402967000&imgsize=a500x&os=ios&sig=b7601abbcdbfba8fd7fb7f2b670bb75d&size=30&start=0&v=2.0&zone=v_59',
            'https://data.baomoi.com/api/v2.0/video/byzone?apikey=ee7b8c7c7019f1b5c0674d41b125faf7&client_version=18.09.03&ctime=%20%20%201538381481&deviceName=iPhone7Plus&fields=title%2Credirect%2Cdate%2CcontentTypes%2Curl%2CoriginalUrl%2CpublisherId%2CpublisherName%2CpublisherIcon%2CvideoChannelId%2CvideoChannelName%2CparentVideoChannelId%2CparentVideoChannelName%2CavatarUrl%2CavatarWidth%2CavatarHeight%2Cdescription%2Ctags%2CtotalImages%2Cimages%2CtotalComments%2CvideoChannelName%2Cbody%2CshareUrl&gy=402967000&imgsize=a500x&os=ios&sig=35d0506bc389448daa25af08e54d907b&size=30&start=30&v=2.0&zone=v_59',
            'https://data.baomoi.com/api/v2.0/video/byzone?apikey=ee7b8c7c7019f1b5c0674d41b125faf7&client_version=18.09.03&ctime=%20%20%201538381572&deviceName=iPhone7Plus&fields=title%2Credirect%2Cdate%2CcontentTypes%2Curl%2CoriginalUrl%2CpublisherId%2CpublisherName%2CpublisherIcon%2CvideoChannelId%2CvideoChannelName%2CparentVideoChannelId%2CparentVideoChannelName%2CavatarUrl%2CavatarWidth%2CavatarHeight%2Cdescription%2Ctags%2CtotalImages%2Cimages%2CtotalComments%2CvideoChannelName%2Cbody%2CshareUrl&gy=402967000&imgsize=a500x&os=ios&sig=9ca68f06082ee07b90e90b8c59e4dbe4&size=30&start=60&v=2.0&zone=v_59'
        );

        foreach ($urls as $url) {
            $res = $client->get($url);
            $content = json_decode($res->getBody())->data;
            foreach ($content as $item) {
                try {
                    $file = file_get_contents(end($item->body[0]->mediaUrl->mp4));
                    if (!Storage::disk('local')->exists('public/\'.$item->videoContentId.\'.mp4\'')) {
                        Storage::disk('local')->put('public/'.$item->videoContentId.'.mp4', $file);
                    }

                    $post = new \App\Post();
                    $post->title = preg_replace('~[^\\pL\d]+~u',' ',$item->title);
                    $post->type = 1;
                    $post->description = preg_replace('~[^\\pL\d]+~u',' ',$item->description);
                    $post->handle_url = str_random(10);
                    $post->thumbnail = $item->avatarUrl;
                    $post->thumbnail_width = $item->avatarWidth;
                    $post->thumbnail_height = $item->avatarHeight;
                    $post->content = 'http://localhost:8000/storage/'.$item->videoContentId.'.mp4';
                    $post->content_width = $item->body[0]->width;
                    $post->content_height = $item->body[0]->height;
                    $post->duration = $item->body[0]->duration;
                    $post->source = 'Collect';
                    $post->seen_count = 0;
                    $post->comment_count = 0;
                    $post->status = 1;
                    $post->save();
                } catch (Exception $e) {
                    continue;
                }
            }
        }

        $res = $client->get('https://xemvn-parser-api.herokuapp.com/');
        $content = json_decode($res->getBody());

        foreach ($content as $item) {
            try {
                $post = new \App\Post();
                $post->title = preg_replace('~[^\\pL\d]+~u',' ',$item->title);
                $post->type = 2;
                $post->description = preg_replace('~[^\\pL\d]+~u',' ',$item->description);
                $post->handle_url = str_random(10);
                $post->thumbnail = $item->img;
                $post->thumbnail_width = 400;
                $post->thumbnail_height = 400;
                $post->content = preg_replace('/\b-400.jpg\b/','-650.jpg', $item->img);
                $post->content_width = 650;
                $post->content_height = 650;
                $post->duration = 0;
                $post->source = 'Collect';
                $post->seen_count = 0;
                $post->comment_count = 0;
                $post->status = 1;
                $post->save();
            } catch (Exception $e) {
                continue;
            }
        }
    }
}
