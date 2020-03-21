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

/* /home/windmymind/Documents/projects/Diploma/univer-site/plugins/alxy/simplemenu/components/menu/default.htm */
class __TwigTemplate_93a00aab5bab10df1411f9040b9d0dcdc17cd8acd32cecda2c1f29a7dd9b72ba extends \Twig\Template
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
        $macros["_self"] = $this->macros["_self"] = $this;
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 15
        echo "
<ul class=\"";
        // line 16
        echo twig_escape_filter($this->env, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = twig_get_attribute($this->env, $this->source, ($context["__SELF__"] ?? null), "options", [], "any", false, false, false, 16)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["main-ul-class"] ?? null) : null), "html", null, true);
        echo "\">
    ";
        // line 17
        echo twig_call_macro($macros["_self"], "macro_menu_links", [twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["__SELF__"] ?? null), "options", [], "any", false, false, false, 17), "links", [], "any", false, false, false, 17), twig_get_attribute($this->env, $this->source, ($context["__SELF__"] ?? null), "options", [], "any", false, false, false, 17)], 17, $context, $this->getSourceContext());
        echo "
</ul>
";
    }

    // line 1
    public function macro_menu_links($__links__ = null, $__options__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "links" => $__links__,
            "options" => $__options__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 2
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["links"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["link"]) {
                // line 3
                echo "        <li class=\"";
                echo twig_escape_filter($this->env, (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ($context["options"] ?? null)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144["main-li-class"] ?? null) : null), "html", null, true);
                echo " ";
                if ((twig_get_attribute($this->env, $this->source, ($context["options"] ?? null), "currentURL", [], "any", false, false, false, 3) == $this->extensions['Cms\Twig\Extension']->pageFilter(twig_get_attribute($this->env, $this->source, $context["link"], "path", [], "any", false, false, false, 3)))) {
                    echo twig_escape_filter($this->env, (($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = ($context["options"] ?? null)) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b["active-class"] ?? null) : null), "html", null, true);
                }
                echo "\">
        \t";
                // line 4
                if (twig_get_attribute($this->env, $this->source, $context["link"], "text", [], "any", false, false, false, 4)) {
                    // line 5
                    echo "            <a href=\"";
                    echo $this->extensions['Cms\Twig\Extension']->pageFilter(twig_get_attribute($this->env, $this->source, $context["link"], "path", [], "any", false, false, false, 5));
                    echo "\" class=\"\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["link"], "text", [], "any", false, false, false, 5), "html", null, true);
                    echo "</a>
            ";
                } else {
                    // line 7
                    echo "            \t<a href=\"#\">";
                    echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                    echo "</a>
                <ul class=\"";
                    // line 8
                    echo twig_escape_filter($this->env, (($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = ($context["options"] ?? null)) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002["sub-ul-class"] ?? null) : null), "html", null, true);
                    echo "\">
                    ";
                    // line 9
                    echo twig_call_macro($macros["_self"], "macro_menu_links", [$context["link"], ($context["options"] ?? null)], 9, $context, $this->getSourceContext());
                    echo "
                </ul>
            ";
                }
                // line 12
                echo "        </li>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['link'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    public function getTemplateName()
    {
        return "/home/windmymind/Documents/projects/Diploma/univer-site/plugins/alxy/simplemenu/components/menu/default.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 12,  99 => 9,  95 => 8,  90 => 7,  82 => 5,  80 => 4,  71 => 3,  66 => 2,  52 => 1,  45 => 17,  41 => 16,  38 => 15,);
    }

    public function getSourceContext()
    {
        return new Source("{% macro menu_links(links, options) %}
    {% for key, link in links %}
        <li class=\"{{options['main-li-class']}} {% if options.currentURL == link.path|page %}{{options['active-class']}}{% endif %}\">
        \t{% if link.text %}
            <a href=\"{{ link.path|page }}\" class=\"\">{{ link.text }}</a>
            {% else %}
            \t<a href=\"#\">{{ key }}</a>
                <ul class=\"{{options['sub-ul-class']}}\">
                    {{ _self.menu_links(link, options) }}
                </ul>
            {% endif %}
        </li>
    {% endfor %}
{% endmacro %}

<ul class=\"{{__SELF__.options['main-ul-class']}}\">
    {{ _self.menu_links(__SELF__.options.links, __SELF__.options) }}
</ul>
", "/home/windmymind/Documents/projects/Diploma/univer-site/plugins/alxy/simplemenu/components/menu/default.htm", "");
    }
}
