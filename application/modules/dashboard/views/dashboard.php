                 <?php 
                  $currency = $this->db->get('company')->row()->currency;
                  $user_id   = $this->session->userdata('user_id');
                  $total_wallet = $this->db->get_where('wallet',array('user_id' =>$user_id))->row()->total_amount;
                  $total_loans = $this->M_Loans->get_total_loans();
                  $total_overdueloans = $this->M_Loans->get_total_overdueloans();

                  $this->db->join('users','users.user_id = staff.user_id');
                  $staff = $this->db->get_where('staff',array('users.deleted' =>0))->result_array();

                  $sms = $this->db->get_where('sms',array('deleted' =>0))->result_array();
                  $emails = $this->db->get_where('emails',array('deleted' =>0))->result_array();
                  $payments = $this->M_Payments->get_total_payments();
                  $missed_payments = $this->M_Payments->get_m_payments();
                  $total_transfers = $this->M_Wallet->get_total_transfers();
                  $total_credits = $this->M_Wallet->get_total_credits();
                  $total_debts = $this->M_Wallet->get_total_debts();

  //echo strtotime(date('Y-m-d'));
  //return;
                ?>

                   <div class="row">
                          <div class="col-lg-3">

                            <!-- Won contests -->
                            <div class="panel bg-teal-400">
                              <div class="panel-body">
                                <div class="heading-elements">
                                  
                                </div>

                                <h3 class="no-margin">
                                  <?php echo  $currency.' '.number_format($total_wallet,2);?></h3>
                                My Wallet
                              </div>

                              <div class="container-fluid">
                                <div id="won-contests"></div>
                              </div>
                            </div>
                            <!-- /won contests -->

                          </div>

                          <div class="col-lg-3">

                            <!-- Preferred contests -->
                            <div class="panel bg-danger-400">
                              <div class="panel-body">
                                <div class="heading-elements">
                                  
                                </div>

                                <h3 class="no-margin">
                                  <?php echo  $currency.' '.number_format($total_loans->row()->balance,2);?></h3>
                                        </h3>
                                Loans
                              </div>

                              <div id="preferred-contests"></div>
                            </div>
                            <!-- /preferred contests -->

                          </div>

                          <div class="col-lg-3">

                            <!-- Most clicked contests -->
                            <div class="panel bg-green-400">
                              <div class="panel-body">
                                <div class="heading-elements">
                                 
                                </div>

                                <h3 class="no-margin">
                                  <?php echo  $currency.' '.number_format($total_overdueloans->row()->balance,2);?></h3>

                                </h3>
                               Overdue Loans
                              </div>

                              <div id="most-clicked-contests"></div>
                            </div>
                            <!-- /most clicked contests -->

                          </div>

                          <div class="col-lg-3">

                            <!-- Submissions turnaround -->
                            <div class="panel bg-orange-400">
                              <div class="panel-body">
                                <div class="heading-elements">
                                 
                                </div>

                                <h3 class="no-margin"><?php echo count($this->M_Staff->get_staffs());?></h3>
                                Staff
                              </div>

                              <div id="submissions-turnaround"></div>
                            </div>
                            <!-- /submissions turnaround -->

                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-3">

                            <!-- Won contests -->
                            <div class="panel bg-grey-400">
                              <div class="panel-body">
                                <div class="heading-elements">
                                </div>

                                <h3 class="no-margin"><?php echo count($this->M_Sms->get_sms());?></h3>
                                SMS
                              </div>

                              <div class="container-fluid">
                                <div id="won-contests"></div>
                              </div>
                            </div>
                            <!-- /won contests -->

                          </div>

                          <div class="col-lg-3">

                            <!-- Preferred contests -->
                            <div class="panel bg-blue-400">
                              <div class="panel-body">
                                <div class="heading-elements">
                                 
                                </div>

                                <h3 class="no-margin"><?php echo count($this->M_Emails->get_emails());?></h3>
                                Emails
                              </div>

                              <div id="preferred-contests"></div>
                            </div>
                            <!-- /preferred contests -->

                          </div>

                          <div class="col-lg-3">

                            <!-- Most clicked contests -->
                            <div class="panel bg-yellow-400">
                              <div class="panel-body">
                                <div class="heading-elements">
                                 
                                </div>

                                <h3 class="no-margin">
                                <?php echo  $currency.' '.number_format($payments->row()->payment_amount,2);?>
                                      </h3>
                                Payments
                              </div>

                              <div id="most-clicked-contests"></div>
                            </div>
                            <!-- /most clicked contests -->

                          </div>

                          <div class="col-lg-3">

                            <!-- Submissions turnaround -->
                            <div class="panel bg-teal-400">
                              <div class="panel-body">
                                <div class="heading-elements">
                                  
                                </div>

                                <h3 class="no-margin">
                              <?php echo  $currency.' '.number_format($missed_payments->row()->balance,2);?>
                                                </h3>
                                Missed Payments
                              </div>

                              <div id="submissions-turnaround"></div>
                            </div>
                            <!-- /submissions turnaround -->

                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-3">

                            <!-- Won contests -->
                            <div class="panel " style="background-color: #ddddef;">
                              <div class="panel-body">
                                <div class="heading-elements">
                                </div>

                                <h3 class="no-margin"><?php echo count($this->M_Client->get_clients());?></h3>
                                Clients
                              </div>

                              <div class="container-fluid">
                                <div id="won-contests"></div>
                              </div>
                            </div>
                            <!-- /won contests -->

                          </div>

                          <div class="col-lg-3">

                            <!-- Preferred contests -->
                            <div class="panel bg-danger-400">
                              <div class="panel-body">
                                <div class="heading-elements">
                                 
                                </div>

                                <h3 class="no-margin">
                              <?php echo  $currency.' '.number_format($total_debts->row()->tr_amount,2);?></h3>

                                </h3>
                                Wallet Debts
                              </div>

                              <div id="preferred-contests"></div>
                            </div>
                            <!-- /preferred contests -->

                          </div>

                          <div class="col-lg-3">

                            <!-- Most clicked contests -->
                            <div class="panel bg-orange-400">
                              <div class="panel-body">
                                <div class="heading-elements">
                                 
                                </div>

                                <h3 class="no-margin">
                                  <?php echo  $currency.' '.number_format($total_credits->row()->tr_amount,2);?></h3>
                                Wallet Credits
                              </div>

                              <div id="most-clicked-contests"></div>
                            </div>
                            <!-- /most clicked contests -->

                          </div>

                          <div class="col-lg-3">

                            <!-- Submissions turnaround -->
                            <div class="panel" style="background-color: #8771e6;">
                              <div class="panel-body">
                                <div class="heading-elements">
                               
                                </div>

                                <h3 class="no-margin">
                                  <?php echo  $currency.' '.number_format($total_transfers->row()->tr_amount,2);?></h3>
                                Wallet Transfers
                              </div>

                              <div id="submissions-turnaround"></div>
                            </div>
                            <!-- /submissions turnaround -->

                          </div>
                        </div>

                       <!-- <div id="chart_div"></div>-->