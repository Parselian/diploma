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

/* /home/windmymind/Documents/projects/Diploma/univer-site/themes/univer-site/partials/info.htm */
class __TwigTemplate_840cfa756d44f4bb394276b2fe822cf509ffe419ac83b303da778b124a93f7fe extends \Twig\Template
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
            echo "<div class=\"info__wrap\">
  <h2 class=\"main-content__title\">";
            // line 5
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 5), "html", null, true);
            echo "</h2>
  <!-- /.main-content__title -->

  ";
            // line 8
            echo twig_get_attribute($this->env, $this->source, $context["post"], "content_html", [], "any", false, false, false, 8);
            echo "
</div>
<!-- /.main-content__wrap -->
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "/home/windmymind/Documents/projects/Diploma/univer-site/themes/univer-site/partials/info.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 8,  49 => 5,  46 => 4,  42 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set posts = blogPosts.posts %}

{% for post in posts %}
<div class=\"info__wrap\">
  <h2 class=\"main-content__title\">{{ post.title }}</h2>
  <!-- /.main-content__title -->

  {{ post.content_html|raw }}
</div>
<!-- /.main-content__wrap -->
{% endfor %}", "/home/windmymind/Documents/projects/Diploma/univer-site/themes/univer-site/partials/info.htm", "");
    }
}
