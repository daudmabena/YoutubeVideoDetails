<?php
class YoutubeVideoDetails
{
	public function __construct()
	{
		$this->video = FALSE;
		$this->video_id = NULL;
	}

	public function video($id)
	{
		$gdata = "https://gdata.youtube.com/feeds/api/videos/".$id."?alt=json";

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $gdata);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$data = curl_exec($ch);
		$retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		if($retcode != 200)
		{
			$this->video = FALSE;
			$this->video_id = NULL;
		}else{
			$this->video = json_decode($data);
			$this->video_id = $id;
		}
	}

	public function get_title()
	{
		if(!$this->video)
		{
			return 0;
		}else{
			return $this->video->entry->title->{'$t'};
		}
	}

	public function get_description()
	{
		if(!$this->video)
		{
			return 0;
		}else{
			return $this->video->entry->content->{'$t'};
		}
	}

	public function get_author()
	{
		if(!$this->video)
		{
			return 0;
		}else{
			return $this->video->entry->author[0]->name->{'$t'};
		}
	}

	public function get_duration()
	{
		if(!$this->video)
		{
			return 0;
		}else{
			return $this->video->entry->{'media$group'}->{'yt$duration'}->seconds;
		}
	}

	public function get_thumbnail()
	{
		if(!$this->video)
		{
			return 0;
		}else{
			return $this->video->entry->{'media$group'}->{'media$thumbnail'}[2]->url;
		}
	}

	public function get_rating()
	{
		if(!$this->video)
		{
			return 0;
		}else{
			return $this->video->entry->{'gd$rating'}->average;
		}
	}

	public function get_amount_raters()
	{
		if(!$this->video)
		{
			return 0;
		}else{
			return $this->video->entry->{'gd$rating'}->numRaters;
		}
	}

	public function get_views()
	{
		if(!$this->video)
		{
			return 0;
		}else{
			return $this->video->entry->{'yt$statistics'}->viewCount;
		}
	}

	public function get_link()
	{
		if(!$this->video)
		{
			return 0;
		}else{
			return $this->video->entry->link[0]->href;
		}
	}

	public function get_category()
	{
		if(!$this->video)
		{
			return 0;
		}else{
			return $this->video->entry->category[1]->label;
		}
	}

	public function get_publish_date()
	{
		if(!$this->video)
		{
			return 0;
		}else{
			return $this->video->entry->published->{'$t'};
		}
	}

	public function get_embed($width,$height)
	{
		if(!$this->video)
		{
			return 0;
		}else{
			return '<iframe width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$this->video_id.'" frameborder="0" allowfullscreen></iframe>';
		}
	}
}
?>