<?php

/**
*	Limeberry Framework
*	
*	a php framework for fast web development.
*	
*	@package Limeberry Framework
*	@author Sinan SALIH
*	@copyright Copyright (C) 2018 Sinan SALIH
*	
**/
namespace limeberry\visual
{
    
    /**
     * A special class for creating html tags.
     */
class Tags
{



        public function PrintCustom($txt)
        {
                echo $txt;
        }



        /**
        *	@param string  Text
        *	@param string Url
        *	@param array attributes
        *	@return string
        */
        public function A($text=null, $url=null, $attrb=null)
        {
            if($attrb==null)
            {
                    return '<a href="'.$url.'">'.$text.'</a>';
            }else
            {
                    $base = '<a href="'.$url.'"';
                    foreach ($attrb as $key => $value) 
                    {
                        $base .= ' '.$key.'="'.$value.'"';
                    }
                    $base.= ' >'.$text.'</a>';
                    return $base;
            }
        }


        /**
        *	@param string  Text
        *	@param string Title
        *	@param array attributes
        *	@return string
        */
        public function Abbr($text=null, $title=null, $attrb=null)
        {
                if($attrb==null)
                {
                        return '<abbr title="'.$title.'">'.$text.'</abbr>';
                }else{
                        $base = '<abbr title="'.$title.'"';
                        foreach ($attrb as $key => $value) 
                        {
                            $base .= ' '.$key.'="'.$value.'"';
                        }
                        $base.= ' >'.$text.'</abbr>';
                        return $base;
                }
        }


        /**
        *	@param string  Source
        *	@param string Type
        *	@return string
        */
        public function Audio($source=null, $type=null)
        {
                $base = '<audio controls>';
                $base .= '<source src="'.$source.'" type="'.$type.'" >';
                $base .= '</audio>';
                return $base;
        }

        /**
        *	@param string  Text
        *	@param array attributes
        *	@return string
        */
        public function B($text=null, $attrb=null)
        {
                if($attrb==null)
                {
                        return '<b>'.$text.'</b>';
                }else{
                        $base = '<b  ';
                        foreach ($attrb as $key => $value) {
                                $base .= ' '.$key.'="'.$value.'"';
                        }
                        $base.= ' >'.$text.'</b>';
                        return $base;
                }
        }

        /**
        *	@return string
        */
        public function Br()
        {
            return "<br>";
        }

        /**
        *	@param string  Text
        *	@param string On click javascript action
        *	@param array attributes
        *	@return string
        */
        public function Button($name=null, $clik=null, $attrb=null)
        {
            if($attrb==null)
            {
                return '<button type="button" onclick="'.$clik.'">'.$name.'</button>';
            }else
            {
                $base = '<button type="button"  onclick="'.$clik.'"';
                foreach ($attrb as $key => $value) 
                {
                    $base .= ' '.$key.'="'.$value.'"';
                }
                $base.= ' >'.$name.'</button>';
                return $base;
            }
        }

        /**
        *	@param string  Text
        *	@param array attributes
        *	@return string
        */
        public function Code($text=null, $attrb=null)
        {
                if($attrb==null)
                {
                        return '<code>'.$text.'</code>';
                }else{
                        $base = '<code ';
                        foreach ($attrb as $key => $value) 
                        {
                            $base .= ' '.$key.'="'.$value.'"';
                        }
                        $base.= ' >'.$text.'</code>';
                        return $base;
                }
        }

        /**
        *	@param array attributes
        *	@return class
        */
        public function dl($attrb=null)
        {
                #$item = new dl($attrb);
                return  new dl_helper($attrb);

        }

        /**
        *	@param string  Text
        *	@param array attributes
        *	@return string
        */
        public function Em($text=null, $attrb=null)
        {
                if($attrb==null)
                {
                    return '<em>'.$text.'</em>';
                }else{
                    $base = '<em ';
                    foreach ($attrb as $key => $value) 
                    {
                        $base .= ' '.$key.'="'.$value.'"';
                    }
                    $base.= ' >'.$text.'</em>';
                    return $base;
                }
        }

        /**
        *	@param string  Text
        *	@param array attributes
        *	@return string
        */
        public function strong($text=null, $attrb=null)
        {
                if($attrb==null)
                {
                        return '<strong>'.$text.'</strong>';
                }else{
                        $base = '<strong ';
                        foreach ($attrb as $key => $value) {
                                $base .= ' '.$key.'="'.$value.'"';
                        }
                        $base.= ' >'.$text.'</strong>';
                        return $base;
                }
        }

        /**
        *	@param string  Text
        *	@param array attributes
        *	@return string
        */
        public function samp($text=null, $attrb=null)
        {
            if($attrb==null)
            {
                    return '<samp>'.$text.'</samp>';
            }else{
                $base = '<samp ';
                foreach ($attrb as $key => $value) 
                {
                    $base .= ' '.$key.'="'.$value.'"';
                }
                $base.= ' >'.$text.'</samp>';
                return $base;
            }
        }

        /**
        *	@param string  Text
        *	@param array attributes
        *	@return string
        */
        public function span($text=null, $attrb=null)
        {
                if($attrb==null)
                {
                        return '<span>'.$text.'</span>';
                }else
                {
                    $base = '<span ';
                    foreach ($attrb as $key => $value) 
                    {
                        $base .= ' '.$key.'="'.$value.'"';
                    }
                    $base.= ' >'.$text.'</span>';
                    return $base;
                }
        }

        /**
        *	@param string  Text
        *	@param array attributes
        *	@return string
        */
        public function kbd($text=null, $attrb=null)
        {
                if($attrb==null)
                {
                    return '<kbd>'.$text.'</kbd>';
                }else{
                    $base = '<kbd ';
                    foreach ($attrb as $key => $value) 
                    {
                        $base .= ' '.$key.'="'.$value.'"';
                    }
                    $base.= ' >'.$text.'</kbd>';
                    return $base;
                }
        }


        /**
        *	@param string  source
        *	@param array attributes
        *	@return string
        */
        public function embed($src=null, $attrb=null)
        {
            if($attrb==null)
            {
                    return '<embed src="'.$src.'">';
            }else
            {
                $base = '<embed src="'.$src.'" ';
                foreach ($attrb as $key => $value) 
                {
                    $base .= ' '.$key.'="'.$value.'"';
                }
                $base.= ' >';
                return $base;
            }
        }


        /**
        *	@param string  Text
        *	@param array attributes
        *	@return string
        */
        public function H1($text=null, $attrb=null)
        {
                if($attrb==null)
                {
                        return '<h1>'.$text.'</h1>';
                }else
                {
                    $base = '<h1 ';
                    foreach ($attrb as $key => $value) {
                            $base .= ' '.$key.'="'.$value.'"';
                    }
                    $base.= ' >'.$text.'</h1>';
                    return $base;
                }
        }
        /**
        *	@param string  Text
        *	@param array attributes
        *	@return string
        */
        public function H2($text=null, $attrb=null)
        {
                if($attrb==null)
                {
                        return '<h2>'.$text.'</h2>';
                }else
                {
                    $base = '<h2 ';
                    foreach ($attrb as $key => $value) 
                    {
                        $base .= ' '.$key.'="'.$value.'"';
                    }
                    $base.= ' >'.$text.'</h2>';
                    return $base;
                }
        }
        /**
        *	@param string  Text
        *	@param array attributes
        *	@return string
        */
        public function H3($text=null, $attrb=null)
        {
                if($attrb==null)
                {
                        return '<h3>'.$text.'</h3>';
                }else
                {
                    $base = '<h3 ';
                    foreach ($attrb as $key => $value) {
                            $base .= ' '.$key.'="'.$value.'"';
                    }
                    $base.= ' >'.$text.'</h3>';
                    return $base;
                }
        }
        /**
        *	@param string  Text
        *	@param array attributes
        *	@return string
        */
        public function H4($text=null, $attrb=null)
        {
                if($attrb==null)
                {
                        return '<h4>'.$text.'</h4>';
                }else{
                        $base = '<h4 ';
                        foreach ($attrb as $key => $value) {
                                $base .= ' '.$key.'="'.$value.'"';
                        }
                        $base.= ' >'.$text.'</h4>';
                        return $base;
                }
        }
        /**
        *	@param string  Text
        *	@param array attributes
        *	@return string
        */
        public function H5($text=null, $attrb=null)
        {
                if($attrb==null)
                {
                        return '<h5>'.$text.'</h5>';
                }else{
                        $base = '<h5 ';
                        foreach ($attrb as $key => $value) {
                                $base .= ' '.$key.'="'.$value.'"';
                        }
                        $base.= ' >'.$text.'</h5>';
                        return $base;
                }
        }
        /**
        *	@param string  Text
        *	@param array attributes
        *	@return string
        */
        public function H6($text=null, $attrb=null)
        {
                if($attrb==null)
                {
                        return '<h6>'.$text.'</h6>';
                }else{
                        $base = '<h6 ';
                        foreach ($attrb as $key => $value) {
                                $base .= ' '.$key.'="'.$value.'"';
                        }
                        $base.= ' >'.$text.'</h6>';
                        return $base;
                }
        }


        /**
        *	@return string
        */
        public function Hr()
        {

                return "<hr>";
        }

        /**
        *	@param string  Text
        *	@param array attributes
        *	@return string
        */
        public function I($text=null, $attrb=null)
        {
                if($attrb==null)
                {
                        return '<i>'.$text.'</i>';
                }else
                {
                    $base = '<i ';
                    foreach ($attrb as $key => $value) {
                            $base .= ' '.$key.'="'.$value.'"';
                    }
                    $base.= ' >'.$text.'</i>';
                    return $base;
                }
        }

        /**
        *	@param string  Text
        *	@param array attributes
        *	@return string
        */
        public function U($text=null, $attrb=null)
        {
                if($attrb==null)
                {
                        return '<u>'.$text.'</u>';
                }else
                {
                    $base = '<u ';
                    foreach ($attrb as $key => $value) {
                            $base .= ' '.$key.'="'.$value.'"';
                    }
                    $base.= ' >'.$text.'</u>';
                    return $base;
                }
        }


        /**
        *	@param string  source
        *	@param array attributes
        *	@return string
        */
        public function Img($src=null, $attrb=null)
        {
                if($attrb==null)
                {
                    return '<img src="'.$src.'">';
                }else
                {
                    $base = '<img src="'.$src.'" ';
                    foreach ($attrb as $key => $value) {
                            $base .= ' '.$key.'="'.$value.'"';
                    }
                    $base.= ' >';
                    return $base;
                }
        }

        /**
        *	@param array attributes
        *	@return class
        */
        public function Ul($attrb=null)
        {
            #$item = new cls($attrb);
            return  new ul_ol_helper("ul",$attrb);
        }

        /**
        *	@param array attributes
        *	@return class
        */
        public function Ol($attrb=null)
        {
            #$item = new cls($attrb);
            return  new ul_ol_helper("ol",$attrb);
        }


        /**
        *	@param int  Value
        *	@param string Text
        *	@param array attributes
        *	@return string
        */
        public function Meter($value=0, $text="display text", $attrb=null)
        {
                if($attrb==null)
                {
                    return '<meter value="'.$value.'" >'.$text.'</meter>';
                }else{
                    $base = '<meter value="'.$value.'" ';
                    foreach ($attrb as $key => $value) {
                            $base .= ' '.$key.'="'.$value.'"';
                    }
                    $base.= ' >'.$text.'</meter>';
                    return $base;
                }
        }

        /**
        *	@param array attributes
        *	@return string
        */
        public function Select($attrb=null)
        {
            #$item = new cls($attrb);
            return  new select_helper($attrb);
        }

        /**
        *	@param int  value
        *	@param int Max value
        *	@param array attributes
        *	@return string
        */
        public function Progress($value=0, $max="100", $attrb=null)
        {
                if($attrb==null)
                {
                        return '<Progress value="'.$value.'"  max="'.$max.'"></Progress>';
                }else
                {
                    $base = '<Progress value="'.$value.'"  max="'.$max.'" ';
                    foreach ($attrb as $key => $value) {
                            $base .= ' '.$key.'="'.$value.'"';
                    }
                    $base.= ' >'.$text.'</Progress>';
                    return $base;
                }
        }


         /**
         * Return Version of Class
         * @return string
         */
        public  static function Version()
        {return "1.0";}

}



//helper classes for html tags
class dl_helper
{
        private $base="";
        private $contents="";

        function __construct($attrb=null)
        {
                if(!isset($attrb))
                {
                        $this->base .= '<dl> ';
                }else{
                        $item1 ='<dl ';
                        foreach ($attrb as $key => $value) {
                                $item1.= ' '.$key.'="'.$value.'"';
                        }
                        $item1 .= ">";
                        $this->base .= $item1;
                }
                return $this;
        }
        public function test($ss)
        {
                return $ss;
        }

        public function dt($text,$attrb=null)
        {
                if($attrb==null)
                {
                        $this->contents .= '<dt>'.$text.'</dt>';
                }else{
                        $item1='<dt ';

                        foreach ($attrb as $key => $value) {
                                $item1.= ' '.$key.'="'.$value.'"';
                        }
                        $item1.= ' >'.$text.'</dt>';
                        $this->contents .=$item1;
                }

                return $this;
        }

        public function dd($text=null,$attrb=null)
        {
                if($attrb==null)
                {
                        $this->contents .= '<dd>'.$text.'</dd>';
                }else{
                        $item1  = '<dd ';
                        foreach ($attrb as $key => $value) {
                                $item1.= ' '.$key.'="'.$value.'"';
                        }
                        $item1 .= ' >'.$text.'</dd>';
                        $this->contents .= $item1;
                }

                return $this;
        }

        public function Create()
        {
                $total_list = $this->base;
                $total_list .= $this->contents;
                $total_list .= "</dl>";
                return $total_list;
        }
}


class ul_ol_helper
{
        private $base="";
        private $contents="";
        private $type_gl = "ul";
        function __construct($type=null, $attrb=null)
        {
                $this->type_gl = $type; 
                if(!isset($attrb))
                {
                        $this->base .= '<'.$type.'> ';
                }else{
                        $item1 ='<'.$type.' ';
                        foreach ($attrb as $key => $value) {
                                $item1.= ' '.$key.'="'.$value.'"';
                        }
                        $item1 .= ">";
                        $this->base .= $item1;
                }
                return $this;
        }

        public function li($text,$attrb=null)
        {
                if($attrb==null)
                {
                        $this->contents .= '<li>'.$text.'</li>';
                }else{
                        $item1='<li ';

                        foreach ($attrb as $key => $value) {
                                $item1.= ' '.$key.'="'.$value.'"';
                        }
                        $item1.= ' >'.$text.'</li>';
                        $this->contents .=$item1;
                }

                return $this;
        }


        public function Create()
        {
                $total_list = $this->base;
                $total_list .= $this->contents;
                $total_list .= "</".$this->type_gl.">";
                return $total_list;
        }
}


class select_helper
{
        private $base="";
        private $contents="";

        function __construct($attrb=null)
        {
                if(!isset($attrb))
                {
                        $this->base .= '<select> ';
                }else{
                        $item1 ='<select ';
                        foreach ($attrb as $key => $value) {
                                $item1.= ' '.$key.'="'.$value.'"';
                        }
                        $item1 .= ">";
                        $this->base .= $item1;
                }
                return $this;
        }

        public function option($text=null, $value=null ,$attrb=null)
        {
                if($attrb==null)
                {
                        $this->contents .= '<option value="'.$value.'">'.$text.'</option>';
                }else{
                        $item1='<option value="'.$value.'" ';

                        foreach ($attrb as $key => $value) {
                                $item1.= ' '.$key.'="'.$value.'"';
                        }
                        $item1.= ' >'.$text.'</option>';
                        $this->contents .=$item1;
                }

                return $this;
        }

        public function optgroup($text=null,$attrb=null)
        {
                if($attrb==null)
                {
                        $this->contents .= '<optgroup label="'.$text.'" >';
                }else{
                        $item1  = '<optgroup label="'.$text.'" ';
                        foreach ($attrb as $key => $value) {
                                $item1.= ' '.$key.'="'.$value.'"';
                        }
                        $item1 .= ' >';
                        $this->contents .= $item1;
                }

                return $this;
        }

        public function Create()
        {
                $total_list = $this->base;
                $total_list .= $this->contents;
                $total_list .= "</select>";
                return $total_list;
        }


    }
}

?>