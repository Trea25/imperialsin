<?php

/* classes.twig */
class __TwigTemplate_867e3445964f60067f43af41d197ff8721beef913be0d8ebd004d473113313cb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/layout.twig", "classes.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body_class' => array($this, 'block_body_class'),
            'page_content' => array($this, 'block_page_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout/layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["__internal_c30e21baede38b6e2867668a1a40cbb5adb690b87a4aadf5ac96b54d13558227"] = $this->loadTemplate("macros.twig", "classes.twig", 2);
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "All Classes | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 4
    public function block_body_class($context, array $blocks = array())
    {
        echo "classes";
    }

    // line 6
    public function block_page_content($context, array $blocks = array())
    {
        // line 7
        echo "    <div class=\"page-header\">
        <h1>Classes</h1>
    </div>

    ";
        // line 11
        echo $context["__internal_c30e21baede38b6e2867668a1a40cbb5adb690b87a4aadf5ac96b54d13558227"]->getrender_classes((isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes")));
        echo "
";
    }

    public function getTemplateName()
    {
        return "classes.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 11,  49 => 7,  46 => 6,  40 => 4,  33 => 3,  29 => 1,  27 => 2,  11 => 1,);
    }
}
/* {% extends "layout/layout.twig" %}*/
/* {% from "macros.twig" import render_classes %}*/
/* {% block title %}All Classes | {{ parent() }}{% endblock %}*/
/* {% block body_class 'classes' %}*/
/* */
/* {% block page_content %}*/
/*     <div class="page-header">*/
/*         <h1>Classes</h1>*/
/*     </div>*/
/* */
/*     {{ render_classes(classes) }}*/
/* {% endblock %}*/
/* */
