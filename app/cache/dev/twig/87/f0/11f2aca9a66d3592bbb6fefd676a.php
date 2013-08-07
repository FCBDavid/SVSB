<?php

/* FOSUserBundle::layout.html.twig */
class __TwigTemplate_87f011f2aca9a66d3592bbb6fefd676a extends Twig_Template
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
        return array (  42 => 7,  38 => 5,  35 => 4,  29 => 3,);
    }
}
