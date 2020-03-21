<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* /home/windmymind/Documents/projects/Diploma/univer-site/themes/univer-site/partials/header-home.htm */
class __TwigTemplate_ed380144c9e16a29ac80241aeb4be77a75b84d9dd7ac311218a4747e80934268 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<header id=\"header\" class=\"header\">
  <ul class=\"burger-menu\">
    <svg id=\"burger-menu-btn\" class=\"ham hamRotate ham4 burger-menu__close\" viewBox=\"0 0 100 100\" width=\"60\">
      <path class=\"line top\" d=\"m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20\" />
      <path class=\"line middle\" d=\"m 70,50 h -40\" />
      <path class=\"line bottom\"
        d=\"m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20\" />
    </svg>
    <li class=\"burger-menu__item\">
      <a href=\"";
        // line 10
        echo $this->extensions['Cms\Twig\Extension']->pageFilter("about.htm");
        echo "\" class=\"burger-menu__link\">Об организации</a>
    </li>
    <!-- /.burger-menu__item -->
    <li class=\"burger-menu__item\">
      <a href=\"";
        // line 14
        echo $this->extensions['Cms\Twig\Extension']->pageFilter("receipt");
        echo "\" class=\"burger-menu__link\">Поступление</a>
    </li>
    <!-- /.burger-menu__item -->
    <li class=\"burger-menu__item\">
      <a href=\"log-in.php\" class=\"burger-menu__link burger-menu-button\">
        <img src=\"";
        // line 19
        echo $this->extensions['Cms\Twig\Extension']->themeFilter("assets/images/log-in.svg");
        echo "\" alt=\"вход\" class=\"burger-menu-button__img\">
        <span class=\"burger-menu-button__text\">Войти</span>
      </a>
    </li>
    <!-- /.burger-menu__item -->
  </ul>
  <!-- /.burger-menu -->

  <div class=\"container header-wrap header-wrap_fixed\">
    <a href=\"";
        // line 28
        echo $this->extensions['Cms\Twig\Extension']->pageFilter("");
        echo "\" class=\"header-logo\">
      <img src=\"";
        // line 29
        echo $this->extensions['Cms\Twig\Extension']->themeFilter("assets/images/logo.png");
        echo "\" alt=\"лого ВУЗа\" class=\"header-logo__img\">
    </a>
    <!-- /.header__link -->

    ";
        // line 33
        $context['__cms_component_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->componentFunction("simpleMenu"        , $context['__cms_component_params']        );
        unset($context['__cms_component_params']);
        // line 34
        echo "
    <svg id=\"burger-btn\" class=\"ham hamRotate ham4 header-burger__btn\" viewBox=\"0 0 100 100\" width=\"60\">
      <path class=\"line top\" d=\"m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20\" />
      <path class=\"line middle\" d=\"m 70,50 h -40\" />
      <path class=\"line bottom\"
        d=\"m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20\" />
    </svg>

    <div class=\"buttons-wrap\">
      <a href=\"/projects/ds/log-in.php\" class=\"button button-authorization\">
        <span class=\"button-authorization__text\">Войти</span>
        <img src=\"";
        // line 45
        echo $this->extensions['Cms\Twig\Extension']->themeFilter("assets/images/log-in.svg");
        echo "\" alt=\"log-in\" class=\"button-authorization__img\">
      </a>
      <!-- /.authoriation__button -->
    </div>
    <!-- /.buttons-wrap -->
  </div>
  <!-- /.container -->

  <div class=\"slider\">
    <div class=\"slider-wrap\">
      <div class=\"slider-slide slider-slide_active\">
        <img src=\"";
        // line 56
        echo $this->extensions['Cms\Twig\Extension']->themeFilter("assets/images/slide-1.jpg");
        echo "\" alt=\"photo\" class=\"slider-slide__img\">
      </div>
      <!-- /.slider__slide -->
      <div class=\"slider-slide\">
        <img src=\"";
        // line 60
        echo $this->extensions['Cms\Twig\Extension']->themeFilter("assets/images/slide-2.jpg");
        echo "\" alt=\"photo\" class=\"slider-slide__img\">
      </div>
      <!-- /.slider__slide -->
      <div class=\"slider-slide\">
        <img src=\"";
        // line 64
        echo $this->extensions['Cms\Twig\Extension']->themeFilter("assets/images/slide-3.png");
        echo "\" alt=\"photo\" class=\"slider-slide__img\">
      </div>
      <!-- /.slider__slide -->
    </div>
    <!-- /.slider-wrap -->

    <ul class=\"slider-dots\">
      <div class=\"slider__arrow slider__arrow_prev\"></div>
      <div class=\"slider__arrow slider__arrow_next\"></div>
    </ul>
    <!-- /.slider-dots -->
  </div>
  <!-- /.slider -->
</header>
<!-- /.header -->";
    }

    public function getTemplateName()
    {
        return "/home/windmymind/Documents/projects/Diploma/univer-site/themes/univer-site/partials/header-home.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 64,  124 => 60,  117 => 56,  103 => 45,  90 => 34,  86 => 33,  79 => 29,  75 => 28,  63 => 19,  55 => 14,  48 => 10,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<header id=\"header\" class=\"header\">
  <ul class=\"burger-menu\">
    <svg id=\"burger-menu-btn\" class=\"ham hamRotate ham4 burger-menu__close\" viewBox=\"0 0 100 100\" width=\"60\">
      <path class=\"line top\" d=\"m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20\" />
      <path class=\"line middle\" d=\"m 70,50 h -40\" />
      <path class=\"line bottom\"
        d=\"m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20\" />
    </svg>
    <li class=\"burger-menu__item\">
      <a href=\"{{ 'about.htm'|page }}\" class=\"burger-menu__link\">Об организации</a>
    </li>
    <!-- /.burger-menu__item -->
    <li class=\"burger-menu__item\">
      <a href=\"{{ 'receipt'|page }}\" class=\"burger-menu__link\">Поступление</a>
    </li>
    <!-- /.burger-menu__item -->
    <li class=\"burger-menu__item\">
      <a href=\"log-in.php\" class=\"burger-menu__link burger-menu-button\">
        <img src=\"{{ 'assets/images/log-in.svg'|theme }}\" alt=\"вход\" class=\"burger-menu-button__img\">
        <span class=\"burger-menu-button__text\">Войти</span>
      </a>
    </li>
    <!-- /.burger-menu__item -->
  </ul>
  <!-- /.burger-menu -->

  <div class=\"container header-wrap header-wrap_fixed\">
    <a href=\"{{ ''|page }}\" class=\"header-logo\">
      <img src=\"{{ 'assets/images/logo.png'|theme }}\" alt=\"лого ВУЗа\" class=\"header-logo__img\">
    </a>
    <!-- /.header__link -->

    {% component 'simpleMenu' %}

    <svg id=\"burger-btn\" class=\"ham hamRotate ham4 header-burger__btn\" viewBox=\"0 0 100 100\" width=\"60\">
      <path class=\"line top\" d=\"m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20\" />
      <path class=\"line middle\" d=\"m 70,50 h -40\" />
      <path class=\"line bottom\"
        d=\"m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20\" />
    </svg>

    <div class=\"buttons-wrap\">
      <a href=\"/projects/ds/log-in.php\" class=\"button button-authorization\">
        <span class=\"button-authorization__text\">Войти</span>
        <img src=\"{{ 'assets/images/log-in.svg'|theme }}\" alt=\"log-in\" class=\"button-authorization__img\">
      </a>
      <!-- /.authoriation__button -->
    </div>
    <!-- /.buttons-wrap -->
  </div>
  <!-- /.container -->

  <div class=\"slider\">
    <div class=\"slider-wrap\">
      <div class=\"slider-slide slider-slide_active\">
        <img src=\"{{ 'assets/images/slide-1.jpg'|theme }}\" alt=\"photo\" class=\"slider-slide__img\">
      </div>
      <!-- /.slider__slide -->
      <div class=\"slider-slide\">
        <img src=\"{{ 'assets/images/slide-2.jpg'|theme }}\" alt=\"photo\" class=\"slider-slide__img\">
      </div>
      <!-- /.slider__slide -->
      <div class=\"slider-slide\">
        <img src=\"{{ 'assets/images/slide-3.png'|theme }}\" alt=\"photo\" class=\"slider-slide__img\">
      </div>
      <!-- /.slider__slide -->
    </div>
    <!-- /.slider-wrap -->

    <ul class=\"slider-dots\">
      <div class=\"slider__arrow slider__arrow_prev\"></div>
      <div class=\"slider__arrow slider__arrow_next\"></div>
    </ul>
    <!-- /.slider-dots -->
  </div>
  <!-- /.slider -->
</header>
<!-- /.header -->", "/home/windmymind/Documents/projects/Diploma/univer-site/themes/univer-site/partials/header-home.htm", "");
    }
}
