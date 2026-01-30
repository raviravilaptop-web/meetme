<?php
ob_start();

                   $selectcount = null;
                                                                    $selectcount = "SELECT count from hit_counter";
                                                                    $RecData = $db->select($selectcount);
                                                                    if ($RecData) {
                                                                        $scount = $RecData[0]['count'];
                                                                    } else {
                                                                        $scount = null;
                                                                    }
                                                                    echo $scount

?>
