/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//var j = $.noConflict();
$(function(){
$('#mega-menu-1').dcMegaMenu({
                    rowItems: '1',
                   speed: 'fast',
                   effect: 'slide'
               });
  // $('.dropdown-toggle').dropdown();
   
    $("#System_menu_id_parent").change(function(){
        var val = $(this);
        postQuery("index.php?r=admin/system_menu/create/id",val,"#System_menu_pos")
        
       
    });
    
     $("#Category_parent_id").change(function(){
        var val = $(this);
        postQuery("index.php?r=admin/category/create/id",val,"#Category_pos")
        
       
    });
       
   function postQuery(url,val,back){
        $.getJSON(url+"/"+val.val()+"/", function(data){
            
            console.log(data);
            $(back).val(data.value);
        });
   }
  
});