<?php if(false===defined('QW'))exit;

/**
 * [Description View]
 */
class View
{
    /**
     * @param mixed $content_view
     * @param mixed $template_view
     * @param null $data
     * 
     * @return [type]
     */
    public function generate($content_view, $template_view, $data = null)
	{
        if(is_file(PATH_THEME . $template_view))
        {
            require_once PATH_THEME . $template_view;
        }
    }
}