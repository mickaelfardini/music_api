<?php

class StylesController
{
	public static function defaultAction()
	{
		if (isset($_GET['action']))
		{
			Controller::renderAction("style_detail");
			return 1;
		}
		Controller::renderAction("styles");
	}
}