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

/* /home/windmymind/Documents/projects/Diploma/univer-site/themes/univer-site/partials/calendar.htm */
class __TwigTemplate_1e9450af3d38c34d195e19becb6ec8f76d21dcad95ac5f664aae1be5fb27838c extends \Twig\Template
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
        $context["posts"] = twig_get_attribute($this->env, $this->source, ($context["blogPosts"] ?? null), "posts", [], "any", false, false, false, 1);
        // line 2
        echo "
";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["posts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 4
            echo "<div class=\"timeline-block\">
  <div class=\"timeline-date\">
    <span class=\"timeline__day\">28</span>
    <span class=\"timeline__month\">мая</span>
  </div>
  <!-- /.timeline-date -->
  ";
            // line 10
            echo twig_get_attribute($this->env, $this->source, $context["post"], "content_html", [], "any", false, false, false, 10);
            echo "
</div>
<!-- /.timeline-block -->
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "/home/windmymind/Documents/projects/Diploma/univer-site/themes/univer-site/partials/calendar.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 10,  46 => 4,  42 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set posts = blogPosts.posts %}

{% for post in posts %}
<div class=\"timeline-block\">
  <div class=\"timeline-date\">
    <span class=\"timeline__day\">28</span>
    <span class=\"timeline__month\">мая</span>
  </div>
  <!-- /.timeline-date -->
  {{ post.content_html|raw }}
</div>
<!-- /.timeline-block -->
{% endfor %}", "/home/windmymind/Documents/projects/Diploma/univer-site/themes/univer-site/partials/calendar.htm", "");
    }
}
