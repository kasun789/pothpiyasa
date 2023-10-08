<?php include('../private/views/librarian/includes/header.main.view.php'); ?>

<body>
  <div class="header">
    <p class="operation">Add Book Copy</p>
    <?php 
     include('../private/views/librarian/includes/header.view.php'); ?>
  </div>

  <!-- navigation bar -->

  <?php
    include('../private/views/librarian/includes/nav.view.php'); ?>

  <!-- notification view -->
  <?php 
   include('../private/views/librarian/includes/notification.view.php'); ?>

  <!-- body -->
  <div class="bookCopyContainer1" id="bookCopyContainer1">
    <?php if ($rows) : ?>
      <h1 class="bookCopyTitle"><?= $rows[0]->Title ?></h1>
      <label class="ISBNbookCopyLable">ISBN</label>
      <P class="ISBNbookCopy"><?= $rows[0]->ISBN ?></P>
      <label class="editionbookCopyLable">Edition</label>
      <P class="editionbookCopy"><?= $rows[0]->Edition ?></P>
      <label class="authobookCopyLable">Author</label>
      <P class="authorbookCopy"><?= $rows[0]->AuthorName ?></P>
      <label class="languagebookCopyLable">Language</label>
      <P class="languagebookCopy"><?= $rows[0]->Language ?></P>
      <label class="publishedYearbookCopyLable">Published Year</label>
      <P class="publishedYearbookCopy"><?= $rows[0]->PublishedYear ?></P>
      <label class="classbookCopyLable">Class</label>
      <P class="classbookCopy"><?= $rows[0]->Class ?></P>
      <label class="locationbookCopyLable">Location</label>
      <P class="locationbookCopy"><?= $rows[0]->Location ?></P>
      <label class="lendingCategorybookCopyLable">Lending Category</label>
      <P class="lendingCategorybookCopy"><?= $rows[0]->LendingCategory ?></P>
      <img src="<?= ROOT ?>/uploads/<?= $rows[0]->Image ?>" alt="" srcset="" class="bookCopyImage">
    <?php endif ?>

    <div class="bookCopyContainer2">
      <form action="" method="post">
        <label class="lendingCategorybookCopyLable2">Lending Category</label>
        <select id="lendingCategorybookCopy2" class="lendingCategorybookCopy2" name="LendingCategorybookCopy2" required>
          <option value="">--- Choose Type ---</option>
          <?php
          $lendingCategory = new LendingCategory();
          $data = $lendingCategory->findAll();
          for ($i = 0; $i < count($data); $i++) {
              echo "<option " . get_select('lendingCategory', $data[$i]->CategoryName) . " value=" . $data[$i]->CategoryName . ">" . $data[$i]->CategoryName . "</option>";
          }

          ?>
        </select>
        <label for="currencybookCopy" class="currencyBookCopyLable">Currency</label>
        <select name="currencybookCopy" id="currentbookCopy" class="currencybookCopy" required>
          <option value="Rs">Rs</option>
          <option value="USD">USD</option>
          <option value="EUR">EUR</option>
          <option value="JPY">JPY</option>
          <option value="GBP">GBP</option>
          <option value="CHF">CHF</option>
          <option value="CAD">CAD</option>
          <option value="AUD">AUD</option>
        </select>

        <label for="priceBookCopy" class="priceBookCopyLable">Currency Amount</label>
        <input type="text" class="priceBookCopy" name="priceBookCopy" required>
        <div class="errorPriceBookCopyMesg">
                    <?php if (isset($errors['priceBookCopy'])) : ?>
                        <p>
                            <?= "*" . $errors['priceBookCopy'] ?>
                        </p>
                    <?php endif; ?>
                </div>

        <label for="noOfCopies" class="noOfCopiesLables">No. Copies</label>
        <input type="number" class="noOfCopies" name="noOfCopies" min="1" max='7' required>

        <button class="bookCopyOkBtn" name="bookCopyAdd">Add</button>
        <button class="bookCopyCancelBtn"><a href="<?=ROOT?>/books/add">Back</a></button>

        <div class="container3CopyBook">
                    <div class="button-box">
                        <div id="btn"></div>
                        <button class="toggle-btn" id="vendorbtn" type="button" value="Vendor" onclick="getVendor()">Vendor</button>
                        <button class="toggle-btn" id="donorbtn" type="button" value="Donor" onclick="getDonor()">Donor</button>
                    </div>

                    <div class="vendorAddBook" id="vendor">
                        <label for="vendorDonor" class="vendorDonorLabel">Name</label>
                        <select id="vendorSelect" class="vendorDonor" name="VendorID" required>
                            <option value="">--- Choose Type ---</option>
                            <?php
                            $vendor = new Vendor();
                            $data = $vendor->findAll();
                            for ($i = 0; $i < count($data); $i++) {
                                echo "<option value='" . $data[$i]->VendorID . "'" . " >" . $data[$i]->VendorID . " - " . $data[$i]->Name . "</option>";
                            }
                            ?>

                        </select>
                        <button type="button" class="VendorDefineBtn" id="VendorDefineBtn" onclick="showVendorDetail()">Define New</button>
                        <Label for="vendorName" class="vendorNameLable" id="vendorNameLable" disabled>Name</Label>
                        <input type="text" class="vendorName" id="vendorName" name="vendorName"  disabled required>
                        <div class="errorMesgVendorNameAddBookCopy">
                            <?php if (isset($errors['vendorName'])) : ?>
                                <p>
                                    <?= "*" . $errors['vendorName'] ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <Label for="vendorEmail" class="vendorEmailLable" id="vendorEmailLable" disabled>E mail</Label>
                        <input type="email" class="vendorEmail" id="vendorEmail" name="vendorEmail"  disabled required>
                        <div class="errorMesgDonorEmailAddBook">
                            <?php if (isset($errors['vendorEmail'])) : ?>
                                <p>
                                    <?= "*" . $errors['vendorEmail'] ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <Label for="vendorAddress" class="vendorAddressLable" id="vendorAddressLable" disabled>Address</Label>
                        <input type="text" class="vendorAddress" id="vendorAddress" name="vendorAddress"  disabled required>
                        <Label for="vendorTel" class="vendorTelLable" id="vendorTelLable" disabled>Telephone No</Label>
                        <input type="text" class="vendorTel" id="vendorTel" name="vendorTel"  disabled required>
                        <div class="errorMesgVendorTelAddBook">
                            <?php if (isset($errors['vendorTel'])) : ?>
                                <p>
                                    <?= "*" . $errors['vendorTel'] ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <!-- <button class="defineDonorVendorbtn"><a href="#">Define New Vendor</a></button> -->
                    </div>

                    <div class="donorAddBook" id="donor">
                        <label for="vendorDonor" class="vendorDonorLabel">Name</label>
                        <select id="DonorSelect" class="vendorDonor" name="DonorID">
                            <option value="">--- Choose Type ---</option>
                            <?php
                            $donor = new Donor();
                            $data = $donor->findAll();
                            for ($i = 0; $i < count($data); $i++) {
                                echo "<option value='" . $data[$i]->DonorID . "'" . ">" . $data[$i]->DonorID . " - " . $data[$i]->Name . "</option>";
                            }
                            ?>
                        </select>
                        <button type="button" class="DonorDefineBtn" id="DonorDefineBtn" onclick="showDonorDetail()">Define New</button>
                        <Label for="donorName" class="DonorNameLable" id="DonorNameLable" disabled>Name</Label>
                        <input type="text" class="DonorName" id="DonorName" name="DonorName"  disabled required>
                        <div class="errorMesgDonorNameAddBookCopy">
                            <?php if (isset($errors['DonorName'])) : ?>
                                <p>
                                    <?= "*" . $errors['DonorName'] ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <Label for="donorEmail" class="DonorEmailLable" id="DonorEmailLable" disabled>E mail</Label>
                        <input type="text" class="DonorEmail" id="DonorEmail" name="DonorEmail" disabled required>
                        <div class="errorMesgDonorEmailAddBook">
                            <?php if (isset($errors['DonorEmail'])) : ?>
                                <p>
                                    <?= "*" . $errors['DonorEmail'] ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <Label for="donorAddress" class="DonorAddressLable" id="DonorAddressLable" disabled>Address</Label>
                        <input type="text" class="DonorAddress" id="DonorAddress" name="DonorAddress"  disabled required>
                        <Label for="donorTel" class="DonorTelLable" id="DonorTelLable" disabled>Telephone No</Label>
                        <input type="text" class="DonorTel" id="DonorTel" name="DonorTel"  disabled required>
                        <div class="errorMesgDonorTelAddBook">
                            <?php if (isset($errors['DonorTel'])) : ?>
                                <p>
                                    <?= "*" . $errors['DonorTel'] ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <!-- <button class="defineDonorVendorbtn"><a href="#">Define New Donor</a></button> -->
                    </div>

                </div>
      </form>
    </div>
    <?php if(isset($errors['errors'])):?>
        <div class="containerWarning" id="containerWarning">
                <i class="fa-solid fa-circle-exclamation" id="exclamationMark"></i>
                <p class="warnningMsg"><span><?=$errors['errors']?></span> </p>
                
            </div>
        </div>
        <?php  endif?>
  </div>
  
  <?php include('../private/views/librarian/includes/popup.bookCopy.sucess.view.php'); ?>

   

  <?php include('../private/views/librarian/includes/footer.view.php'); ?>

  <!-- set the popup msg -->
  <?php if ($flag[0] == 1) {
        echo '<script type="text/javascript">openBookCopy();</script>';
    } ?>