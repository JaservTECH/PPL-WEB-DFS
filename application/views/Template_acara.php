<div class="block" id="layout-acara" style="width: 100%; height : 100%;">
    <div style="display:<?php if($login) echo "block"; else echo "none";?>; position:absolute; height: 40px; background : rgba(255,255,255,0.3);width : 100%;"> 
        <span class="icon-plus pointer" id="add-acara" style="font-size : 20px; line-height : 40px;float : right ; margin-right : 10px;"></span>
        <span class="icon-edit pointer" id="edit-acara" style="font-size : 20px; line-height : 40px;float : right ; margin-right : 10px;"></span>
        <div id="add-acara-message" style="display: none; position : absolute; margin-top : 40px; z-index : 3000; color : #666; background-color : rgba(250,250,250,0.7); text-align : center; width : 100%;">
            <input type="text" placeholder="Tanggal" style="background-color : #666; width : 95%; margin-left : 2.5%; margin-top : 10px;">
            <input type="text" placeholder="jam" style="background-color : #666; width : 95%; margin-left : 2.5%; margin-top : 10px;">
            <input type="text" placeholder="Nama Acara" style="background-color : #666; width : 95%; margin-left : 2.5%; margin-top : 10px;">
            <input type="text" placeholder="Penanggungjawab" style="background-color : #666; width : 95%; margin-left : 2.5%; margin-top : 10px;">
            <input type="button" value="Masukan" style="background-color : #666; width : 95%; margin-left : 2.5%; margin-top : 10px;">
        </div>
    </div>
    <div id="acara-layout" style="width:100%; height : 100%;">
        <div style="" id="watch-layout"> 
            <span id="watch-me">12:10</span>
        </div> 
        <div id="content-acara" style="background : rgba(255,255,255,0.2);">
            <table class="table table-hover"> 
                <thead> 
                    <tr> 
                        <th>Tanggal</th> 
                        <th>Jam</th> 
                        <th>Nama Acara</th> 
                        <th>Penyelenggara</th> 
                    </tr> 
                </thead> 
                <tbody id="content-table-acara" style="overflow-y:auto;"> 
                    <?php
                     if(array_key_exists(0,$temp)){
                            foreach($temp as $value){
                                echo "<tr><td>".$value['tanggal']."</td>
                                <td>".$value['jam']."</td>
                                <td>".$value['nama_acara']."</td>
                                <td>".$value['penyelenggara']."</td></tr>";
                            }
                        }else{
                            echo $temp['id']." ".$temp['tanggal']."<br>";
                        }
                    ?>
                </tbody> 
            </table>
        </div> 
    </div>
</div>