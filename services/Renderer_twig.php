<?php

namespace app\services;
use app\interfaces\IRenderer;
use Twig_loader_Filesystem;

class Renderer_twig implements IRenderer
{
	protected $templateDir;
	protected $templater;

	public function __construct()
	{
		//$this->templateDir = $_SERVER['DOCUMENT_ROOT'] . "/../views";
		$this->templateDir = "../views";
		$loader = new Twig_loader_Filesystem($this->templateDir);
		$this->templater = new \Twig_Environment($loader);
	}

	public function render($template, $params = [])
	{
		$template = $this->templater->loadTemplate($template . ".html");
		return $template->render($params);
	}
}

?>