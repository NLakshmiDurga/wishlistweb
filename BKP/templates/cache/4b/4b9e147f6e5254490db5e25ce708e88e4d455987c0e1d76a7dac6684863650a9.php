<?php

/* items_list.html */
class __TwigTemplate_4e2fdfc0ef0b62394413b72cb09a350d4eaf9b3bb1812e10dfa8b1b27101cf70 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<ul>
";
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["search_results"]) ? $context["search_results"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 3
            echo "            <li>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array(), "array"), "html", null, true);
            echo "<span data-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", array(), "array"), "html", null, true);
            echo "\"></span></li>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 5
        echo "
</ul>";
    }

    public function getTemplateName()
    {
        return "items_list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 5,  26 => 3,  22 => 2,  19 => 1,);
    }
}
/* <ul>*/
/* {% for item in search_results %}*/
/*             <li>{{ item['title'] }}<span data-id="{{item['id']}}"></span></li>*/
/* {% endfor %}*/
/* */
/* </ul>*/
