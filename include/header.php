
<div id="header">
        <div class="header_list">

            <div class="logo">
              <a href="index.php" class="logo_list"><img src="https://radiotruyen.info/public/resource/img/logo.jpg" alt=""></a>
            </div>

            <div class="menu">
                <?php
                 
                $sql_menu = mysqli_query($con,"SELECT * FROM tbl_menu ORDER BY menu_id");
                $menu = array();
                    while($row_menu = mysqli_fetch_array($sql_menu)){         
                        $menu[] = $row_menu;                   
                    }    
                    function menutree($sourceArr,$parent = 0,&$new){
                            if(count($sourceArr)>0){
                                $new .= '<ul>';
                                    foreach($sourceArr as $key => $value1){
                                        if($value1['parent']==$parent){
                                           $nameee =  $value1['menu_name'];
                                            $new .= '<li><a href="'.convert_name($nameee).'-'.$value1['menu_id'].'.html">'.$nameee.'</a>';        
                                            $newparent1 = $value1['menu_id'];
                                            unset($sourceArr[$key]);
                                            menutree($sourceArr,$newparent1,$new);
                                        }
                                    }
                                
                                $new .= '</ul></li>';
                            }
                    }
                   menutree($menu,0,$new);
                          echo str_replace('<ul></ul>','',$new);
                ?>

                    <div class="search_list">
                        <a class="search" href=""><i class="fas fa-search"></i></a>     
                    </div>                          
            </div>
            <div id="menu-bar-icon"> <i class="icon_bar fas fa-bars"></i> </div>
        </div>

    <div class="search-mobile">
        <form action="search" method="POST">
                <input type="text" placeholder="Nhập tên truyện có dấu hoặc không dấu..." name="text" class="put"> 
                <button type="submit" name="search" class="btn"><i class="btn1 fas fa-search"></i></button>
        </form>
    </div>

</div>

                <!-- day la phan moi them -->
<div class="menu-mobile">

<div class="mobile_nav">
<?php
            
            $sql_menu1 = mysqli_query($con,"SELECT * FROM tbl_menu ORDER BY menu_id");
            $menu1 = array();
                while($row_menu = mysqli_fetch_array($sql_menu)){         
                    $menu1[] = $row_menu;                   
                }    
                function menutre($sourceAr,$parent = 0,&$new){
                        if(count($sourceAr)>0){
                            $new .= '<ul>';
                                foreach($sourceAr as $key1 => $value1){
                                    if($value1['parent']==$parent){
                                        $new .= '<li><a href="#">'.$value1['menu_name'].'</a>';
                                        $newparent = $value1['menu_id'];
                                        unset($sourceAr[$key1]);
                                        menutree($sourceAr,$newparent,$new);
                                    }
                                }
                            $new .= '</ul></li>';
                        }
                }
               menutre($menu1,0,$new);
                      echo str_replace('<ul></ul>','',$new);
            ?>
</div>
</div>

<!-- cuoi phan moi them -->
