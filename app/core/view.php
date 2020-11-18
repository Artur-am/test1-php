<?php if(false===defined('QW'))exit;

/**
 * [Description View]
 */
class View
{
    /**
     * @param string $content_view
     * @param string $template_view
     * @param null $data
     * 
     * @return [type]
     */
    public function generate(string $content_view, string $template_view, $data = null)
	{
        $this->setAjaxToken();
        if(is_file(PATH_THEME . $template_view))
        {
            if(is_array($data))
            {
                $data['header'] =<<<JS
                    <script>
                        window.token = '{$_SESSION['token']}';
                    </script>
                JS;
                extract($data, EXTR_REFS);
            }

            return require_once PATH_THEME . $template_view;
        }
    }
    /**
     * @return [type]
     */
    private function setAjaxToken()
    {
        $sol = [ 'ds', 'sdffe', 'sdfe', '4@5#6rG', md5( time() ) ];
        $token = ( time() + 13) * 7;
        $_SESSION['token'] = md5( 'NS' . $token . time() . array_rand( $sol, 1 ) . $token . array_rand( $sol, 1 ) . md5($token . '&'));    
    }
}