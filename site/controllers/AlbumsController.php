<?php

class AlbumsController
{
	public static function defaultAction()
	{
		if (isset($_GET['action']))
		{
			Controller::renderAction("album_detail");
			return 1;
		}
		Controller::renderAction("album");
	}
}