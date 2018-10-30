<?php

class ArtistsController
{
	public static function defaultAction()
	{
		if (isset($_GET['action']))
		{
			Controller::renderAction("artist_detail");
			return 1;
		}
		Controller::renderAction("artist");
	}
}