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
                $file = file_get_contents(end($item->body[0]->mediaUrl->mp4));
                Storage::disk('local')->put('public/'.$item->videoContentId.'.mp4', $file);

                DB::table('posts')->insert([
                    'title' => preg_replace('~[^\\pL\d]+~u',' ',$item->title),
                    'type' => 1,
                    'description' => preg_replace('~[^\\pL\d]+~u',' ',$item->description),
                    'handle_url' => str_random(10),
                    'thumbnail' => $item->avatarUrl,
                    'thumbnail_width' => $item->avatarWidth,
                    'thumbnail_height' => $item->avatarHeight,
                    'content' => 'localhost:8000/storage/'.$item->videoContentId.'.mp4',
                    'content_width' => $item->body[0]->width,
                    'content_height' => $item->body[0]->height,
                    'duration' => $item->body[0]->duration,
                    'source' => 'Collect',
                    'seen_count' => 0,
                    'comment_count' => 0,
                    'status' => 1,
                ]);

            }
        }
    }
}
