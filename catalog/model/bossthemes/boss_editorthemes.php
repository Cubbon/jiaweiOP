<?php
class ModelBossthemesBossEditorthemes extends Model
{
   private $color_themes = array(
        'theme1' => array(
            'g_bg_color'                    => 'ffffff',
            'gbox_bg_color'                    => 'ffffff',
            'g_text_color_1' 			    => '969696',
            'g_text_color_2' 			    => '323232',
			'g_color_hover' 				=> 'F44D00',
            
			'h_bg_color'             		=> '033FEF',
            'h_color_text_1'        		=> 'ffffff',
            'h_color_text_2'        		=> 'F44D00',
            'h_color_cart'          		=> 'ffffff',
			'h_color_bgcart_1'        		=> '9DCD0E',
			'h_color_bgcart_2'        		=> '7AA301',
			'h_color_borcart'        		=> 'F44D00',
			'h_color_arrow_borcart'    		=> 'F44D00',
			'h_color_bgsearch_1'        	=> '006cd5',
			
            'f_color_1'                  	=> '323232',
            'f_color_2'        				=> '646464',
            'f_color_hover'        			=> '0135BD',
            'f_bg_color'        			=> 'ffffff',
			
            'm_bg_normal_color'             => 'EE4F00',
            'mdrop_bg_color'             	=> 'ffffff',
            'm_text_title_color'             => 'ffffff',
            'm_text_normal_color'           => '323232',
            'm_text_hover_color'            => 'F44D00',
            'm_text_normal_color_1'        	=> '323232',
            'm_text_hover_color_1'       	=> 'F44D00',
            'm_text_normal_color_2' 		=> '646464',
			'm_text_hover_color_2'          => 'F44D00',
			'm_text_normal_color_3'          => '999999',
						
			'p_border_color'         		=> 'F44D00',
            'p_name_color'         			=> '0135BD',
            'p_name_hover_color'   			=> '323232',
            'p_des_color'        			=> '646464',
            'p_price_color'              	=> 'FF0101',
            'p_spec_color'                  => 'c8c8c8',
			
            'p_but_normal_color'            => '9DCD0E',
            'p_but_hover_color'     		=> '7AA301',
            'p_text_but_normal_color'       => 'ffffff',
			'p_text_but_hover_color'        => 'ffffff',
			
            'p_but_normal_color_2'          => 'C8C8C8',
            'p_but_hover_color_2'     		=> 'ABAAAA',
			
            'p_but_normal_color_3'            => '525252',
            'p_but_hover_color_3'     		=> '000000',
            'p_text_but_normal_color_3'       => 'ffffff',
			'p_text_but_hover_color_3'        => 'ffffff',
			
			
            't_page_color'                  	=> 'F44D00',
            't_block_color_text_1'         		=> 'F44D00',
            't_block_color_bg_1'         		=> 'ffffff',
            't_block_color_bgborder_1'         	=> 'F44D00',
            't_block_color_bgArrows_1'         	=> 'F44D00',
            't_block_color_text_2'         		=> 'ffffff',
            't_block_color_bg_2'         		=> '0768ea',
            't_block_color_bgborder_2'         	=> 'F44D00',
            't_block_color_text_view_2'         => 'F44D00',
            't_block_color_hover_view_2'        => '323232',
            't_block_color_bgNormal_view_2'     => 'F44D00',
            't_block_color_bgHover_view_2'      => '323232',
			
            't_bread_normal_color_1'        	=> '646464',
            't_bread_hover_color_1'         	=> 'F44D00',
            't_bread_normal_color_2'        	=> 'F44D00'
        ),
        'theme2' => array(
            'g_bg_color'                    => 'ffffff',
            'gbox_bg_color'                    => 'ffffff',
            'g_text_color_1' 			    => '646464',
            'g_text_color_2' 			    => '969696',
			'g_color_hover' 				=> 'ffb600',
            
			'h_bg_color'             		=> 'f00000',
            'h_color_text_1'        		=> 'ffffff',
            'h_color_text_2'        		=> 'ffb600',
            'h_color_cart'          		=> 'ffffff',
			'h_color_bgcart_1'        		=> '0f0f0f',
			'h_color_bgcart_2'        		=> '6d6d6d',
			'h_color_borcart'        		=> 'ffb600',
			'h_color_arrow_borcart'    		=> 'ffb600',
			'h_color_bgsearch_1'        	=> 'f00000',
			
            'f_color_1'                  	=> '323232',
            'f_color_2'        				=> '646464',
            'f_color_hover'        			=> 'ff0101',
            'f_bg_color'        			=> 'ffffff',
			
            'm_bg_normal_color'             => 'ffb600',
            'mdrop_bg_color'             	=> 'ffffff',
            'arrow_color'             		=> 'ffb600',
            'm_text_title_color'             => 'ffffff',
            'm_text_normal_color'           => '323232',
            'm_text_hover_color'            => 'ffb600',
            'm_text_normal_color_1'        	=> '323232',
            'm_text_hover_color_1'       	=> 'ffb600',
            'm_text_normal_color_2' 		=> '646464',
			'm_text_hover_color_2'          => 'ffb600',
			'm_text_normal_color_3'          => '999999',
			
			'p_border_color'         		=> '646464',
            'p_name_color'         			=> '0079ff',
            'p_name_hover_color'   			=> '323232',
            'p_des_color'        			=> '969696',
            'p_price_color'              	=> '141414',
            'p_spec_color'                  => 'c8c8c8',
			
            'p_but_normal_color'            => 'ffb600',
            'p_but_hover_color'     		=> 'b38000',
            'p_text_but_normal_color'       => 'ffffff',
			'p_text_but_hover_color'        => 'ffffff',
			
            'p_but_normal_color_2'          => 'C8C8C8',
            'p_but_hover_color_2'     		=> 'ABAAAA',
			
            'p_but_normal_color_3'            => '525252',
            'p_but_hover_color_3'     		  => '000000',
            'p_text_but_normal_color_3'       => 'ffffff',
			'p_text_but_hover_color_3'        => 'ffffff',
			
			
            't_page_color'                  	=> '141414',
            't_block_color_text_1'         		=> '141414',
            't_block_color_bg_1'         		=> 'ffffff',
            't_block_color_bgborder_1'         	=> '141414',
            't_block_color_bgArrows_1'         	=> '141414',
            't_block_color_text_2'         		=> 'ffffff',
            't_block_color_bg_2'         		=> 'f00000',
            't_block_color_bgborder_2'         	=> 'ffb600',
            't_block_color_text_view_2'         => '85b716',
            't_block_color_hover_view_2'        => '323232',
            't_block_color_bgNormal_view_2'     => '85b716',
            't_block_color_bgHover_view_2'      => '323232',
			
            't_bread_normal_color_1'        	=> '646464',
            't_bread_hover_color_1'         	=> '85b716',
            't_bread_normal_color_2'        	=> '85b716'
        ),
        'theme3' => array(
            'g_bg_color'                    => 'ffffff',
            'gbox_bg_color'                    => 'ffffff',
            'g_text_color_1' 			    => '323232',
            'g_text_color_2' 			    => '969696',
			'g_color_hover' 				=> 'f00000',
            
			'h_bg_color'             		=> 'f4ae01',
            'h_color_text_1'        		=> 'ffffff',
            'h_color_text_2'        		=> 'f00000',
            'h_color_cart'          		=> 'ffffff',
			'h_color_bgcart_1'        		=> '0063d1',
			'h_color_bgcart_2'        		=> '003774',
			'h_color_borcart'        		=> 'ee0000',
			'h_color_arrow_borcart'    		=> 'ee0000',
			'h_color_bgsearch_1'        	=> 'f4ae01',
			
            'f_color_1'                  	=> '323232',
            'f_color_2'        				=> '969696',
            'f_color_hover'        			=> '0135BD',
            'f_bg_color'        			=> 'ffffff',
			
            'm_bg_normal_color'             => 'ee0000',
            'mdrop_bg_color'             	=> 'ffffff',
            'arrow_color'             		=> 'ee0000',
            'm_text_title_color'            => 'ffffff',
            'm_text_normal_color'           => '323232',
            'm_text_hover_color'            => 'f00000',
            'm_text_normal_color_1'        	=> '323232',
            'm_text_hover_color_1'       	=> 'f00000',
            'm_text_normal_color_2' 		=> '646464',
			'm_text_hover_color_2'          => 'f00000',
			'm_text_normal_color_3'          => '999999',
			
			'p_border_color'         		=> '646464',
            'p_name_color'         			=> '323232',
            'p_name_hover_color'   			=> 'F00000',
            'p_des_color'        			=> '646464',
            'p_price_color'              	=> 'f00000',
            'p_spec_color'                  => 'c8c8c8',
			
            'p_but_normal_color'            => 'ee0000',
            'p_but_hover_color'     		=> 'a60000',
            'p_text_but_normal_color'       => 'ffffff',
			'p_text_but_hover_color'        => 'ffffff',
			
            'p_but_normal_color_2'          => 'C8C8C8',
            'p_but_hover_color_2'     		=> 'ABAAAA',
			
            'p_but_normal_color_3'            => '525252',
            'p_but_hover_color_3'     		  => '000000',
            'p_text_but_normal_color_3'       => 'ffffff',
			'p_text_but_hover_color_3'        => 'ffffff',
			
			
            't_page_color'                  	=> '0063d1',
            't_block_color_text_1'         		=> '0063d1',
            't_block_color_bg_1'         		=> 'ffffff',
            't_block_color_bgborder_1'         	=> '0063d1',
            't_block_color_bgArrows_1'         	=> '0063d1',
            't_block_color_text_2'         		=> 'ffffff',
            't_block_color_bg_2'         		=> 'ffb600',
            't_block_color_bgborder_2'         	=> 'f00000',
            't_block_color_text_view_2'         => '85b716',
            't_block_color_hover_view_2'        => '618510',
            't_block_color_bgNormal_view_2'     => '85b716',
            't_block_color_bgHover_view_2'      => '618510',
			
            't_bread_normal_color_1'        	=> '646464',
            't_bread_hover_color_1'         	=> '85b716',
            't_bread_normal_color_2'        	=> '85b716'
        ),
        'theme4' => array(
            'g_bg_color'                    => 'ffffff',
            'gbox_bg_color'                    => 'ffffff',
            'g_text_color_1' 			    => '969696',
            'g_text_color_2' 			    => '969696',
			'g_color_hover' 				=> 'FF5A00',
            
			'h_bg_color'             		=> '98c801',
            'h_color_text_1'        		=> 'ffffff',
            'h_color_text_2'        		=> 'ff5a00',
            'h_color_cart'          		=> 'ffffff',
			'h_color_bgcart_1'        		=> '0063d1',
			'h_color_bgcart_2'        		=> '003e82',
			'h_color_borcart'        		=> 'f74f00',
			'h_color_arrow_borcart'    		=> 'f74f00',
			'h_color_bgsearch_1'        	=> '98c801',
			
            'f_color_1'                  	=> '323232',
            'f_color_2'        				=> '646464',
            'f_color_hover'        			=> '0135BD',
            'f_bg_color'        			=> 'ffffff',
			
            'm_bg_normal_color'             => 'f74f00',
            'mdrop_bg_color'             	=> 'ffffff',
            'arrow_color'             		=> 'f74f00',
            'm_text_title_color'             => 'ffffff',
            'm_text_normal_color'           => '323232',
            'm_text_hover_color'            => 'f74f00',
            'm_text_normal_color_1'        	=> '323232',
            'm_text_hover_color_1'       	=> 'f74f00',
            'm_text_normal_color_2' 		=> '646464',
			'm_text_hover_color_2'          => 'f74f00',
			'm_text_normal_color_3'          => '999999',
			
            'p_border_color'         		=> '0c32b7',
            'p_name_color'         			=> '8ebb01',
            'p_name_hover_color'   			=> '323232',
            'p_des_color'        			=> '646464',
            'p_price_color'              	=> 'f95501',
            'p_spec_color'                  => 'c8c8c8',
			
            'p_but_normal_color'            => 'f95501',
            'p_but_hover_color'     		=> '8e3000',
            'p_text_but_normal_color'       => 'ffffff',
			'p_text_but_hover_color'        => 'ffffff',
			
            'p_but_normal_color_2'          => 'C8C8C8',
            'p_but_hover_color_2'     		=> 'ABAAAA',
			
            'p_but_normal_color_3'            => '525252',
            'p_but_hover_color_3'     		  => '000000',
            'p_text_but_normal_color_3'       => 'ffffff',
			'p_text_but_hover_color_3'        => 'ffffff',
			
			
            't_page_color'                  	=> 'f95501',
            't_block_color_text_1'         		=> 'f95501',
            't_block_color_bg_1'         		=> 'ffffff',
            't_block_color_bgborder_1'         	=> 'f95501',
            't_block_color_bgArrows_1'         	=> 'f95501',
            't_block_color_text_2'         		=> 'ffffff',
            't_block_color_bg_2'         		=> '98c801',
            't_block_color_bgborder_2'         	=> 'f95501',
            't_block_color_text_view_2'         => '0c32b7',
            't_block_color_hover_view_2'        => '323232',
            't_block_color_bgNormal_view_2'     => '0c32b7',
            't_block_color_bgHover_view_2'      => '323232',
			
            't_bread_normal_color_1'        	=> '646464',
            't_bread_hover_color_1'         	=> '0c32b7',
            't_bread_normal_color_2'        	=> '0c32b7'
        )
    );
	
	private $background = array(
            'g_bg_image_1'       => 'back_1.png',
            'g_bg_image_2'       => 'back_2.png',
            'g_bg_image_3'       => 'back_3.png',
            'g_bg_image_4'       => 'back_4.png',
            'g_bg_image_5'       => 'back_5.png',
            'g_bg_image_6'       => 'back_6.png',
			'g_bg_image_7'       => 'back_7.png',
            'g_bg_image_8'       => 'back_8.png',
            'g_bg_image_9'       => 'back_9.png',
            'g_bg_image_10'       => 'back_10.png',
            'g_bg_image_11'       => 'back_11.png',
            'g_bg_image_12'       => 'back_12.png',
			'g_bg_image_13'       => 'back_13.png',
            'g_bg_image_14'       => 'back_14.png',
            'g_bg_image_15'       => 'back_15.png'
    );

    private $theme_name;
	

    private $theme_names = array(
        'theme1' => 'Blue',
        'theme2' => 'Red',
        'theme3' => 'Yellow',
        'theme4' => 'Green'
    );

    public function setThemeName($theme_name)
    {
        $this->theme_name = $theme_name;
    }

   
    public function getThemeNames()
    {
        return $this->theme_names;
    }

    public function getColorThemes()
    {
        return $this->color_themes;
    }
	
	public function getBackgrounds()
    {
        return $this->background;
    }

}