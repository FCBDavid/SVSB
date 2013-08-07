<?php

/* FOSUserBundle::layout.html.twig */
class __TwigTemplate_0dbc73c75d2de7bbd8bd134af7b1be06 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("TwigBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "TwigBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Usuario";
    }

    // line 4
    public function block_body($context, array $blocks = array())
    {
        // line 5
        echo "        <div class=\"container-fluid\">
            <div class=\"row-fluid\">
                    ";
        // line 7
        $this->displayBlock("fos_user_content", $context, $blocks);
        echo "
            </div>
         </div>
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 5,  35 => 4,  29 => 3,  72 => 22,  67 => 20,  60 => 16,  55 => 14,  51 => 13,  46 => 11,  42 => 7,  39 => 9,  33 => 7,  31 => 6,  28 => 5,);
    }
}
