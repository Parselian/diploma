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

/* /home/windmymind/Documents/projects/Diploma/univer-site/themes/univer-site/partials/specialties.htm */
class __TwigTemplate_047736eec180093c1e64d69a9856cea023a297112d8cf28bdc7877ada4e60755 extends \Twig\Template
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
            echo "<tr class=\"main-content-table__row\">
  
  ";
            // line 6
            echo twig_get_attribute($this->env, $this->source, $context["post"], "content_html", [], "any", false, false, false, 6);
            echo "

</tr>
<!-- /.main-content-table__row -->
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "

<!-- <tr class=\"main-content-table__row\">
  <td class=\"main-content-table__cell\">09.02.03</td>
  <td class=\"main-content-table__cell\">Компьютерные системы и комплексы</td>
  <td class=\"main-content-table__cell\">Информатика и вычислительная техника</td>
  <td class=\"main-content-table__cell\">очно-заочное</td>
  <td class=\"main-content-table__cell\">60</td>
  <td class=\"main-content-table__cell\">20</td>
</tr> -->";
    }

    public function getTemplateName()
    {
        return "/home/windmymind/Documents/projects/Diploma/univer-site/themes/univer-site/partials/specialties.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 11,  50 => 6,  46 => 4,  42 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set posts = blogPosts.posts %}

{% for post in posts %}
<tr class=\"main-content-table__row\">
  
  {{ post.content_html|raw }}

</tr>
<!-- /.main-content-table__row -->
{% endfor %}


<!-- <tr class=\"main-content-table__row\">
  <td class=\"main-content-table__cell\">09.02.03</td>
  <td class=\"main-content-table__cell\">Компьютерные системы и комплексы</td>
  <td class=\"main-content-table__cell\">Информатика и вычислительная техника</td>
  <td class=\"main-content-table__cell\">очно-заочное</td>
  <td class=\"main-content-table__cell\">60</td>
  <td class=\"main-content-table__cell\">20</td>
</tr> -->", "/home/windmymind/Documents/projects/Diploma/univer-site/themes/univer-site/partials/specialties.htm", "");
    }
}
