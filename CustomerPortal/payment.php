<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment</title>
    <link rel="stylesheet" type="text/css" href="reserve.css">
    <script src="reserve.js"></script>
</head>

<body>

<h2>Payment Page</h2>

<div>
    <form name="rent_payment" method="post" action="receipt.php">
        <br><br>

        <?php
        session_start();
        $payment_amount = $_SESSION['payment_amount'];
        echo "<label for='amount'>" . 'Amount to be paid : ' . $payment_amount . "</label>";

        ?>

        <label for="payment">Payment method</label>
        <select id="payment" name="payment" required>
            <option value="">Choose Payment method</option>
            <option value="Cash">Cash</option>
            <option value="Visa">Visa</option>
        </select>

        <br><br>

        <button type="submit" id="pay_now" name="pay_now">Pay Now</button>

    </form>


    <form name="pay_later" method="post" action="paylater.php">
        <br><br>

        <button type="submit" id="paylater" name="paylater">Pay Later</button>
        <br><br>

        <br><br>

    </form>

</div>
</body>
</html>