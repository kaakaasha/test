<?php
    require 'Connection.php';

        //Вывод информации из БД
        function Table ($conn){

            $sql = "SELECT * FROM information";
            echo '<form method="post"><table><tr><th>id</th><th>Имя</th><th>Дата и время создания заказа</th><th>Дата и время последнего изменения</th><th>Статус</th></tr> ';

            if($result = $conn->query($sql)){
                foreach($result as $row){
                
                    $kol++;
                    $arrayDate[$kol]=$row["Dat"];
                    echo '<tr><td>',$row["id"],'</td>';
                    echo '<td>',$row["Nam"],'</td>';
                    echo '<td>',$row["Dat"],'</td>';
                    echo '<td>',$row["New_dat"],'</td>';
                    if ($row["Status"] == 0){
    
                        echo '<td>','В ожидании','</tr>';
                    }
                    elseif ($row["Status"]==1){
    
                        echo '<td>','Подтвержден','</tr>';
                    }
                    else{
                    
                        echo '<td>','Завершен','</td>';
                    }
    
                    ?>
                    <td><button type="submit" name="<?php echo $kol;?>">Подтвердить</button></td>
                    <td><button type="submit" name="End<?php echo $kol;?>">Завершить</button></td>
                    <?php
                }
            }
        
            $arrayDate[$kol+1]=$kol;
            return $arrayDate;
        }
        
        $arrayDate = Table($conn);
        $kol=end($arrayDate);
        echo'</table>';

        //кнопка подтверждения заказа
        function ButtonCon ($conn,$kol){
            if(isset($_POST["$kol"])) {
                 
                //подтверждение заказа
                $sql ="UPDATE information set Status = 1, New_dat = DEFAULT where id = '$kol'"; 
                $conn->query($sql);
                mysqli_close($conn);
                header ('Location: View.php');
            }
        }
        
        //завершение заказа
        function ButtonEnds($conn, $arrayDate, $kol){
            
            $datatim = date('Y-m-d H:i:s', time());
            $oldtime = strtotime($arrayDate[$kol]);
            $diff_in_min = floor((strtotime($datatim) - $oldtime) / 60);

            if($diff_in_min>=1){

                $sql ="UPDATE information set Status = 2, New_dat = DEFAULT where id = '$kol'"; 
                $conn->query($sql);
                mysqli_close($conn);
                header ('Location: View.php');
            }
            else{

                echo'Минута не прошла';
            }
        }


        //логика кнопки завершения заказа
        function ButtonEnd ($conn, $kol, $arrayDate){

            if(isset($_POST["End$kol"])) {
                
                //взятие часов
                $datesad = strtotime($arrayDate[$kol]);
                $datesad = date('H', $datesad);

                if($datesad>11){

                    echo '<h1>Уверены???</h1><td><button type="submit" name="confidence',$kol,'">Да,я уверен</button></td>';
                }

                else{

                    ButtonEnds($conn, $arrayDate, $kol);

                }
            }

            elseif(isset($_POST["confidence$kol"])) {
            
                
                ButtonEnds($conn, $arrayDate, $kol);    
            
            }
        }

        // отслеживаем нажатую кнпку
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            while ($kol > 0){
                
                ButtonCon($conn, $kol);
                ButtonEnd($conn, $kol, $arrayDate);
                $kol--;

            }
        }
?>
    </form><a href="../index.html" class="button beer-button-blue">На главную</a>;
