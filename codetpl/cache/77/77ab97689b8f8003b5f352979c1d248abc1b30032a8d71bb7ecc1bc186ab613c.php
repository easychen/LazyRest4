<?php

/* insert.tpl.code */
class __TwigTemplate_9df73104a7e4bd19993d5d885a0d9e7a585927715296fa4fc7f70abef5172962 extends Twig_Template
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
        echo "<?php

/**
* 向数据表";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "target_table_list", array()), "html", null, true);
        echo "添加记录
* @ApiDescription(section=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "target_table_list", array()), "html", null, true);
        echo "\", description=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "iname", array()), "html", null, true);
        echo "\")
* @ApiLazyRoute(uri=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "iuri", array()), "html", null, true);
        echo "\",method=\"POST\")

";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "input", array()) - (isset($context["fileds"]) ? $context["fileds"] : null)));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 9
            echo "
* @ApiParams(name=\"";
            // line 10
            echo twig_escape_filter($this->env, (isset($context["field_enname"]) ? $context["field_enname"] : null), "html", null, true);
            echo "\", type=\"string\", 
";
            // line 11
            if (((isset($context["field_cannull"]) ? $context["field_cannull"] : null) == 0)) {
                echo "nullable=false";
            } else {
                echo "nullable=true";
            }
            echo ",description=\"";
            echo twig_escape_filter($this->env, (isset($context["field_cnname"]) ? $context["field_cnname"] : null), "html", null, true);
            echo "\", check=\"";
            echo twig_escape_filter($this->env, (isset($context["field_checkfunction"]) ? $context["field_checkfunction"] : null), "html", null, true);
            echo "\", cnname=\"";
            echo twig_escape_filter($this->env, (isset($context["field_cnname"]) ? $context["field_cnname"] : null), "html", null, true);
            echo "\")

";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "
* @ApiReturn(type=\"object\", sample=\"{'code': 0,'message': 'success'}\")
*/
 function insert_data( )
{

}

?>";
    }

    public function getTemplateName()
    {
        return "insert.tpl.code";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 14,  50 => 11,  46 => 10,  43 => 9,  39 => 8,  34 => 6,  28 => 5,  24 => 4,  19 => 1,);
    }
}
/* <?php*/
/* */
/* /***/
/* * 向数据表{{settings.target_table_list}}添加记录*/
/* * @ApiDescription(section="{{settings.target_table_list}}", description="{{settings.iname}}")*/
/* * @ApiLazyRoute(uri="{{settings.iuri}}",method="POST")*/
/* */
/* {% for item in settings.input-fileds %}*/
/* */
/* * @ApiParams(name="{{field_enname}}", type="string", */
/* {% if( field_cannull == 0 ) %}nullable=false{% else %}nullable=true{% endif %},description="{{field_cnname}}", check="{{field_checkfunction}}", cnname="{{field_cnname}}")*/
/* */
/* {% endfor %}*/
/* */
/* * @ApiReturn(type="object", sample="{'code': 0,'message': 'success'}")*/
/* *//* */
/*  function insert_data( )*/
/* {*/
/* */
/* }*/
/* */
/* ?>*/
