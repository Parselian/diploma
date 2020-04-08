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

/* /home/windmymind/Documents/projects/Diploma/univer-site/themes/univer-site/pages/receipt.htm */
class __TwigTemplate_bb428d7c3f3dfbfe1909abe2104b78fd00eb3a451bf845503e7998ca561d0b4a extends \Twig\Template
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
        echo "<main class=\"container main\">
    <nav class=\"main-sidebar\">
      <h2 class=\"main-sidebar__title\">
        <div class=\"main-sidebar__title-text\">Меню</div>
        <img src=\"";
        // line 5
        echo $this->extensions['Cms\Twig\Extension']->themeFilter("assets/images/down-arrow_dark.svg");
        echo "\" class=\"header-list__link-arrow main-sidebar__title-icon\">
      </h2>
      <!-- /.main-sidebar__title -->

      <ul class=\"main-sidebar-list\">
        <li class=\"main-sidebar-list__item\">
          <a href=\"#info-receipt\" class=\"main-sidebar-list__link active\">информация по приему</a>
        </li>
        <!-- /.main-sidebar-list__item -->
        <li class=\"main-sidebar-list__item\">
          <a href=\"#species\" class=\"main-sidebar-list__link\">Специальности</a>
        </li>
        <!-- /.main-sidebar-list__item -->
        <li class=\"main-sidebar-list__item\">
          <a href=\"#calendar\" class=\"main-sidebar-list__link\">Календарь приёма</a>
        </li>
        <!-- /.main-sidebar-list__item -->
      </ul>
      <!-- /.main-sidebar-list -->
    </nav>
    <!-- /.main-sidebar -->

    <section id=\"info-receipt\" class=\"main-content visible\">
      <h2 class=\"main-content__title\">Информация по приему</h2>
      <!-- /.main-content__title -->

      ";
        // line 31
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("documents"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 32
        echo "    </section>

    <section id=\"species\" class=\"main-content hidden\">
      <h2 class=\"main-content__title\">Специальности</h2>
      <!-- /.main-content__title -->

      <div class=\"main-content-wrap\">

        ";
        // line 40
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("specialties"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 41
        echo "        
      </div>
    </section>
    <!-- /.main-content -->

    <section id=\"calendar\" class=\"main-content hidden\">
      <h2 class=\"main-content__title\">Календарь приема</h2>
      <!-- /.main-content__title -->

      <div class=\"timeline\">
        
        ";
        // line 52
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("calendar"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 53
        echo "
      </div>
      <!-- /.timeline -->
    </section>
  </main>";
    }

    public function getTemplateName()
    {
        return "/home/windmymind/Documents/projects/Diploma/univer-site/themes/univer-site/pages/receipt.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 53,  103 => 52,  90 => 41,  86 => 40,  76 => 32,  72 => 31,  43 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<main class=\"container main\">
    <nav class=\"main-sidebar\">
      <h2 class=\"main-sidebar__title\">
        <div class=\"main-sidebar__title-text\">Меню</div>
        <img src=\"{{ 'assets/images/down-arrow_dark.svg'|theme }}\" class=\"header-list__link-arrow main-sidebar__title-icon\">
      </h2>
      <!-- /.main-sidebar__title -->

      <ul class=\"main-sidebar-list\">
        <li class=\"main-sidebar-list__item\">
          <a href=\"#info-receipt\" class=\"main-sidebar-list__link active\">информация по приему</a>
        </li>
        <!-- /.main-sidebar-list__item -->
        <li class=\"main-sidebar-list__item\">
          <a href=\"#species\" class=\"main-sidebar-list__link\">Специальности</a>
        </li>
        <!-- /.main-sidebar-list__item -->
        <li class=\"main-sidebar-list__item\">
          <a href=\"#calendar\" class=\"main-sidebar-list__link\">Календарь приёма</a>
        </li>
        <!-- /.main-sidebar-list__item -->
      </ul>
      <!-- /.main-sidebar-list -->
    </nav>
    <!-- /.main-sidebar -->

    <section id=\"info-receipt\" class=\"main-content visible\">
      <h2 class=\"main-content__title\">Информация по приему</h2>
      <!-- /.main-content__title -->

      {% partial 'documents' %}
    </section>

    <section id=\"species\" class=\"main-content hidden\">
      <h2 class=\"main-content__title\">Специальности</h2>
      <!-- /.main-content__title -->

      <div class=\"main-content-wrap\">

        {% partial 'specialties' %}
        
      </div>
    </section>
    <!-- /.main-content -->

    <section id=\"calendar\" class=\"main-content hidden\">
      <h2 class=\"main-content__title\">Календарь приема</h2>
      <!-- /.main-content__title -->

      <div class=\"timeline\">
        
        {% partial 'calendar' %}

      </div>
      <!-- /.timeline -->
    </section>
  </main>", "/home/windmymind/Documents/projects/Diploma/univer-site/themes/univer-site/pages/receipt.htm", "");
    }
}
