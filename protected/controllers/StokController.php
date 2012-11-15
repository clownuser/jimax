<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Stok
 *
 * @author user
 */
class StokController extends CController {

    public function actions() {
        return array(
           

            'b' => array(
                'class' => 'CWebServiceAction',
            ),
        );
    }

    //put your code here
   /**
     * @param string индекс предприятия
     * @return string
     * @soap
     */
    public function getPrice($str='IBM') {

        $prices = array('IBM' => 100, 'GOOGLE' => 350);
        return $prices[$str];
    }

    /**
     * @param string индекс предприятия
     * @return string
     * @soap
     */
    public function getName($t) {
        return  $t;
    }

}

?>
