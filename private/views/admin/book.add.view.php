<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pothpiyasa</title>
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/header.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/admin/includes/nav.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/addBook.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/popup.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/all.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/notification.css">

</head>

<body>
    <div class="header">
        <p class="operation">Add Book</p>
        <?php 
        include('../private/views/librarian/includes/header.view.php'); ?>
    </div>

    <!-- navigation bar -->
    <?php include('../private/views/includes/nav.view.php'); ?>

    <!-- notification view -->
    <?php include('../private/views/librarian/includes/notification.view.php'); ?>


    <div class="bodyContainer01">

        <!-- form -->

        <div class="bodyContainer2" id="bookAddContainer1">

            <form method="post" enctype="multipart/form-data">

                <label for="tital" class="titalLabel">Title</label>
                <input type="text" name="Title" class="tital" id="tital" value="<?= get_var('Title') ?>" required>
                <div class="errorTitleMesg">
                    <?php if (isset($errors['Title'])) : ?>
                        <p>
                            <?= "*" . $errors['Title'] ?>
                        </p>
                    <?php endif; ?>
                </div>


                <label for="isbn" class="isbnLabel">ISBN</label>
                <input type="text" name="ISBN" class="isbn" id="isbn" value="<?= get_var('ISBN') ?>" required>
                <div class="errorISBNMesg">
                    <?php if (isset($errors['ISBN'])) : ?>
                        <?php if (isset($errors['ISBNo'])) : ?>
                            <?php $isbnCopy = $errors['ISBNo'];?>
                        <?php endif ?>
                        <p>
                            <?= "*" . $errors['ISBN'] ?>
                        </p>

                    <?php endif; ?>
                </div>


                <label for="author" class="authorsLabel">Author(s)</label>
                <input type="text" name="AuthorName" class="author" id="author" value="<?= get_var('AuthorName') ?>" required>
                <div class="errorAuthorMesg">
                    <?php if (isset($errors['Author'])) : ?>
                        <p>
                            <?= "*" . $errors['Author'] ?>
                        </p>
                    <?php endif; ?>
                </div>

                <!-- <button type="button" name="checkauthor" value="checkauthor" class="checkAuthor"><a href="#">Define a Author</a></button> -->

                <label for="edition" class="editionLabel">Edition</label>
                <input type="text" name="Edition" class="edition" id="edition" value="<?= get_var('Edition') ?>" required>
                <div class="errorEditionMesg">
                    <?php if (isset($errors['Edition'])) : ?>
                        <p>
                            <?= "*" . $errors['Edition'] ?>
                        </p>
                    <?php endif; ?>
                </div>


                <label for="publisher" class="publisherLabel">Publisher</label>
                <input type="text" name="Publisher" class="publisher" id="publisher" value="<?= get_var('Publisher') ?>" required>
                <div class="errorMesgPublisherEditBook">
                    <?php if (isset($errors['Publisher'])) : ?>
                        <p>
                            <?= "*" . $errors['Publisher'] ?>
                        </p>
                    <?php endif; ?>
                </div>
                <label for="year" class="yearLabel">Publish Year</label>
                <input type="text" name="PublishedYear" class="year" id="year" value="<?= get_var('PublishedYear') ?>" required>
                <div class="errorMesgPublishedYearEditBook">
                    <?php if (isset($errors['PublishedYear'])) : ?>
                        <p>
                            <?= "*" . $errors['PublishedYear'] ?>
                        </p>
                    <?php endif; ?>
                </div>
                <label for="category" class="cateogoryLable">Category</label>
                <select id="category" class="category" name="Category" id="category" value="<?= get_var('Category') ?>" required>
                    <option value="">--- Choose Type ---</option>
                    <?php
                    $category = new BookCategory();
                    $data = $category->findAll();
                    for ($i = 0; $i < count($data); $i++) {
                        echo "<option " . get_select('Category', $data[$i]->CategoryID) . " value='" . $data[$i]->CategoryID . "'" . ">" . $data[$i]->Name . "</option>";
                    }

                    ?>

                </select>


                <label for="condition" class="conditionLable">Condition</label>
                <select id="condition" class="condition" name="Condition" required>
                    <option value="">--- Choose Type ---</option>
                    <option <?= get_select('Condition', 'FineFine/Like New(F)') ?> value="FineFine/Like New(F)">Fine/Like New(F)</option>
                    <option <?= get_select('Condition', 'Near Fine(NF)') ?> value="Near Fine(NF)">Near Fine(NF)</option>
                    <option <?= get_select('Condition', 'Very Good(VG)') ?> value="Very Good(VG)">Very Good(VG)</option>
                    <option <?= get_select('Condition', 'Good(G)') ?> value="Good(G)">Good(G)</option>
                    <option <?= get_select('Condition', 'Fair(F)') ?> value="Fair(F)">Fair(F)</option>
                    <option <?= get_select('Condition', 'Poor(P)') ?> value="Poor(P)">Poor(P)</option>
                </select>

                <label for="pages" class="pagesLabel">Pages</label>
                <input type="text" name="NoPages" class="pages" id="pages" value="<?= get_var("NoPages") ?>" required>
                <div class="errorNoPagesMesg">
                    <?php if (isset($errors['NoPages'])) : ?>
                        <p>
                            <?= "*" . $errors['NoPages'] ?>
                        </p>
                    <?php endif; ?>
                </div>

                <label for="languages" class="languagesLabel">Language</label>
                <select id="languages" class="languages" name="Languages" required>
                    <option value="">--- Choose Type ---</option>
                    <option <?= get_select("Languages", "English") ?> value="English">English</option>
                    <option <?= get_select("Languages", "Sinhala") ?> value="Sinhala">Sinhala</option>
                    <option <?= get_select("Languages", "Tamil") ?> value="Tamil">Tamil</option>
                </select>

                <label for="bookImage" class="bookImageLabel">Upload Image</label>
                <input type="file" id="imagefile" name="Image" class="imagefile" value="<?= get_var("Image") ?>" required>
                <div class="errorMesgImageEditBook">
                    <?php if (isset($errors['Image'])) : ?>
                        <p>
                            <?= "*" . $errors['Image'] ?>
                        </p>
                    <?php endif; ?>
                </div>
                <label for="receivedDate" class="receivedLabel">Received Date</label>
                <?php $date = date('Y-m-d');?>
                <input type="date" id="receivedDate" name="ReceivedDate" class="receivedDate" value="<?= get_var("ReceivedDate") ?>" min="1999-01-01" max="<?=$date?>" required>

                <label for="class" class="class">Class</label>
                <input type="text" id="classinput" name="classinput" class="classinput" value="<?= get_var("classinput") ?>" required>

                <label for="location" class="locationLabel">Location</label>
                <input type="text" id="location" name="location" class="location" value="<?= get_var("location") ?>" required>

                <label for="lendingCategory" class="lendingCategoryLabel">Lending Category</label>
                <select id="lendingCategory" class="lendingCategory" name="LendingCategory" required>
                    <option value="">--- Choose Type ---</option>
                    <?php
                    $lcategory = new LendingCategory();
                    $data = $lcategory->findAll();
                    for ($i = 0; $i < count($data); $i++) {
                        echo "<option " . get_select('LendingCategory', $data[$i]->LendingID) . " value='" . $data[$i]->LendingID . "'" . ">" . $data[$i]->CategoryName . "</option>";
                    }

                    ?>
                </select>

                <label for="price" class="priceLabel">Price</label>
                <input type="text" id="price" name="price" class="price" value="<?= get_var("price") ?>">
                <div class="errorMesgpriceAddBook">
                    <?php if (isset($errors['price'])) : ?>
                        <p>
                            <?= "*" . $errors['price'] ?>
                        </p>
                    <?php endif; ?>
                </div>
                <!-- vender/doner -->

                <div class="container3">
                    <div class="button-box">
                        <div id="btn"></div>
                        <button class="toggle-btn" id="vendorbtn" type="button" value="Vendor" onclick="getVendor()">Vendor</button>
                        <button class="toggle-btn" id="donorbtn" type="button" value="Donor" onclick="getDonor()">Donor</button>
                    </div>

                    <div class="vendorAddBook" id="vendor">
                        <label for="vendorDonor" class="vendorDonorLabel">Name</label>
                        <select id="vendorSelect" class="vendorDonor" name="VendorID">
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
                        <input type="text" class="vendorName" id="vendorName" name="vendorName" value="<?= get_var('vendorName') ?>" disabled>
                        <div class="errorMesgVendorNameAddBook">
                            <?php if (isset($errors['vendorName'])) : ?>
                                <p>
                                    <?= "*" . $errors['vendorName'] ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <Label for="vendorEmail" class="vendorEmailLable" id="vendorEmailLable" disabled>E mail</Label>
                        <input type="email" class="vendorEmail" id="vendorEmail" name="vendorEmail" value="<?= get_var('vendorEmail') ?>" disabled>
                        <div class="errorMesgDonorEmailAddBook">
                            <?php if (isset($errors['vendorEmail'])) : ?>
                                <p>
                                    <?= "*" . $errors['vendorEmail'] ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <Label for="vendorAddress" class="vendorAddressLable" id="vendorAddressLable" disabled>Address</Label>
                        <input type="text" class="vendorAddress" id="vendorAddress" name="vendorAddress" value="<?= get_var('vendorAddress') ?>" disabled>
                        <Label for="vendorTel" class="vendorTelLable" id="vendorTelLable" disabled>Telephone No</Label>
                        <input type="text" class="vendorTel" id="vendorTel" name="vendorTel" value="<?= get_var('vendorTel') ?>" disabled>
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
                        <input type="text" class="DonorName" id="DonorName" name="DonorName" value="<?= get_var('DonorName') ?>" disabled>
                        <div class="errorMesgDonorNameAddBook">
                            <?php if (isset($errors['DonorName'])) : ?>
                                <p>
                                    <?= "*" . $errors['DonorName'] ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <Label for="donorEmail" class="DonorEmailLable" id="DonorEmailLable" disabled>E mail</Label>
                        <input type="text" class="DonorEmail" id="DonorEmail" name="DonorEmail"value="<?= get_var('DonorEmail') ?>" disabled>
                        <div class="errorMesgDonorEmailAddBook">
                            <?php if (isset($errors['DonorEmail'])) : ?>
                                <p>
                                    <?= "*" . $errors['DonorEmail'] ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <Label for="donorAddress" class="DonorAddressLable" id="DonorAddressLable" disabled>Address</Label>
                        <input type="text" class="DonorAddress" id="DonorAddress" name="DonorAddress" value="<?= get_var('DonorAddress') ?>" disabled>
                        <Label for="donorTel" class="DonorTelLable" id="DonorTelLable" disabled>Telephone No</Label>
                        <input type="text" class="DonorTel" id="DonorTel" name="DonorTel" value="<?= get_var('DonorTel') ?>" disabled>
                        <div class="errorMesgDonorTelAddBook">
                            <?php if (isset($errors['DonorTel'])) : ?>
                                <p>
                                    <?= "*" . $errors['DonorTel'] ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <!-- <button class="defineDonorVendorbtn"><a href="#">Define New Donor</a></button> -->
                    </div>


                    <button class="addbookbtn" id="addbookbtn" name="submit" type="submit">Add Book</button>
                    <button class="backbtnAddBook"><a href="<?= ROOT ?>/librariandashboard">Back</a></button>

                </div>
            </form>

        </div>

        <?php if(isset($errors['errors'])):?>
        <div class="containerWarning" id="containerWarning">
                <i class="fa-solid fa-circle-exclamation" id="exclamationMark"></i>
                <p class="warnningMsg"><span><?=$errors['erros']?></span> .</p>
            </div>
        </div>
        <?php endif?>

    </div>
    
    <?php
    include('../private/views/includes/popup.add.view.php'); ?>
    <?php include('../private/views/librarian/includes/popup.bookCopy.view.php'); ?>

    <?php include('../private/views/librarian/includes/footer.view.php'); ?>

    <?php if (isset($errors['ISBN']) && sizeof($errors)==2) : ?>
        <?php if ($errors['ISBN'] == "ISBN already exists") : ?>

            <?php echo '<script type="text/javascript">openaddCopyViewBookPopup("http://localhost/Pothpiyasa/public/books/add");</script>' ?>
        <?php endif; ?>
    <?php endif; ?>



    <!-- set the popup msg -->
    <?php if ($flag[0] == 1) {
        

        echo '<script type="text/javascript">openaddBookPopup("http://localhost/Pothpiyasa/public/books/add");</script>';;
    } ?>