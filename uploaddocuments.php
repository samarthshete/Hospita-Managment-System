<?php

if(is_uploaded_file($_FILES['fileup']['tmp_name']))
            {
                $target="assets/uploads";
                $path = $target . basename($_FILES['fileup']['name']);
                if(move_uploaded_file($_FILES['fileup']['tmp_name'],$path))
                {
                  echo " First File is Uploaded...";
                    //$c3="images/". basename($_FILES['fileup']['name']);
                }
                else
            {
                echo "File Not Uploaded...";
            }
            }
            else
            {
                echo "File Not Selected...";
            }
           
?>