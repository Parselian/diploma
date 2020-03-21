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

/* /home/windmymind/Documents/projects/Diploma/univer-site/themes/univer-site/partials/footer.htm */
class __TwigTemplate_1d59a4049be9cea38c731ef5ad64b45c7a0aee08e6646559952dbce5f323d2b9 extends \Twig\Template
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
        echo "<footer class=\"footer\">
  <div class=\"container footer-wrap\">
    <a href=\"";
        // line 3
        echo $this->extensions['Cms\Twig\Extension']->pageFilter("home");
        echo "\" class=\"footer-logo\">
      <img src=\"";
        // line 4
        echo $this->extensions['Cms\Twig\Extension']->themeFilter("assets/images/logo.png");
        echo "\" alt=\"лого ВУЗа\" class=\"footer-logo__img\">
    </a>
    <!-- /.header__link -->

    <ul class=\"footer-list footer-contacts\">
      <h4 class=\"footer-list__title\">Контакты</h4>
      <!-- /.footer-contacts__title -->
      <li class=\"footer-list__item footer-contacts__item\">
        <img src=\"";
        // line 12
        echo $this->extensions['Cms\Twig\Extension']->themeFilter("assets/images/pin.svg");
        echo "\" alt=\"pin\" class=\"footer-list__img\">
        Полюстровский пр., 84А, Санкт-Петербург, 194100
      </li>
      <!-- /.footer-contacts__item -->

      <li class=\"footer-list__item footer-contacts__item\">
        <img src=\"";
        // line 18
        echo $this->extensions['Cms\Twig\Extension']->themeFilter("assets/images/phone.svg");
        echo "\" alt=\"phone\" class=\"footer-list__img\">
        <a href=\"tel:+79999999999\" class=\"footer-list__link\">8 (931) 363-54-52</a>
      </li>
      <!-- /.footer-contacts__item -->

      <li class=\"footer-list__item footer-contacts__item\">
        <img src=\"";
        // line 24
        echo $this->extensions['Cms\Twig\Extension']->themeFilter("assets/images/email.svg");
        echo "\" alt=\"email\" class=\"footer-list__img\">
        <a href=\"mailto:femowog605@jancloud.net\" class=\"footer-list__link\">femowog605@jancloud.net</a>
      </li>
      <!-- /.footer-contacts__item -->
    </ul>
    <!-- /.footer-contacts -->

    <ul class=\"footer-list footer-info\">
      <h4 class=\"footer-list__title\">Важная информация</h4>
      <li class=\"footer-list__item footer-info__item\">&copy; Какой-то университет</li>
      <!-- /.footer-list__item footer-info__item -->
      <li class=\"footer-list__item footer-info__item\">
        <a href=\"#\" class=\"footer-list__link\">Политика конфиденциальности</a>
      </li>
      <!-- /.footer-list__item footer-info__item -->
    </ul>
    <!-- /.footer-list footer-info -->
  </div>
  <!-- /.container footer-wrap -->
</footer>
<!-- /.footer -->";
    }

    public function getTemplateName()
    {
        return "/home/windmymind/Documents/projects/Diploma/univer-site/themes/univer-site/partials/footer.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 24,  65 => 18,  56 => 12,  45 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<footer class=\"footer\">
  <div class=\"container footer-wrap\">
    <a href=\"{{ 'home'|page }}\" class=\"footer-logo\">
      <img src=\"{{ 'assets/images/logo.png'|theme }}\" alt=\"лого ВУЗа\" class=\"footer-logo__img\">
    </a>
    <!-- /.header__link -->

    <ul class=\"footer-list footer-contacts\">
      <h4 class=\"footer-list__title\">Контакты</h4>
      <!-- /.footer-contacts__title -->
      <li class=\"footer-list__item footer-contacts__item\">
        <img src=\"{{ 'assets/images/pin.svg'|theme }}\" alt=\"pin\" class=\"footer-list__img\">
        Полюстровский пр., 84А, Санкт-Петербург, 194100
      </li>
      <!-- /.footer-contacts__item -->

      <li class=\"footer-list__item footer-contacts__item\">
        <img src=\"{{ 'assets/images/phone.svg'|theme }}\" alt=\"phone\" class=\"footer-list__img\">
        <a href=\"tel:+79999999999\" class=\"footer-list__link\">8 (931) 363-54-52</a>
      </li>
      <!-- /.footer-contacts__item -->

      <li class=\"footer-list__item footer-contacts__item\">
        <img src=\"{{ 'assets/images/email.svg'|theme }}\" alt=\"email\" class=\"footer-list__img\">
        <a href=\"mailto:femowog605@jancloud.net\" class=\"footer-list__link\">femowog605@jancloud.net</a>
      </li>
      <!-- /.footer-contacts__item -->
    </ul>
    <!-- /.footer-contacts -->

    <ul class=\"footer-list footer-info\">
      <h4 class=\"footer-list__title\">Важная информация</h4>
      <li class=\"footer-list__item footer-info__item\">&copy; Какой-то университет</li>
      <!-- /.footer-list__item footer-info__item -->
      <li class=\"footer-list__item footer-info__item\">
        <a href=\"#\" class=\"footer-list__link\">Политика конфиденциальности</a>
      </li>
      <!-- /.footer-list__item footer-info__item -->
    </ul>
    <!-- /.footer-list footer-info -->
  </div>
  <!-- /.container footer-wrap -->
</footer>
<!-- /.footer -->", "/home/windmymind/Documents/projects/Diploma/univer-site/themes/univer-site/partials/footer.htm", "");
    }
}
