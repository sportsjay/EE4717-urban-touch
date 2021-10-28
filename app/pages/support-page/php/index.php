<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/index.css" />
  <title>Contact Us</title>
  <script src="https://kit.fontawesome.com/f8c6106aef.js" crossorigin="anonymous"></script>

</head>

<body>
  <!-- Navigation -->
  <?php include '../../../components/navigation/php/index.php' ?>
  <!-- Contact Us Section -->
  <!-- Banner -->
  <header class="contact-us global-content-wrapper  global-flex-column-wrapper">
    <span class="global-content-typography-title">CONTACT US</span>
    <hr class="global-horizontal-line" width="100px">
  </header>
  <!-- Body -->
  <form class="contact-us global-content-wrapper global-flex-column-wrapper" method="POST" action=""
    onsubmit="return validateForm()">
    <table class="global-content-typography-text">
      <tr>
        <td>
          <div class="form-items global-flex-column-wrapper">
            <label class="global-content-typography-text" for="first_name">First Name</label>
            <input class="global-content-typography-text" type="text" id="first_name" name="first_name">
            <span id="error-first-name" class="global-content-typography-subtext"
              style="color: var(--global-color-danger); display:none;">&#10060; Please enter a valid name</span>
          </div>
        </td>
        <td>
          <div class="form-items global-flex-column-wrapper">
            <label class="global-content-typography-text" for="last_name">Last Name</label>
            <input class="global-content-typography-text" type="text" id="last_name" name="last_name">
            <span id="error-last-name" class="global-content-typography-subtext"
              style="color: var(--global-color-danger); display:none;">&#10060; Please enter a valid name</span>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="form-items global-flex-column-wrapper">
            <div class="global-flex-row-wrapper" style="justify-content: space-between;">
              <label class="global-content-typography-text" for="email">Email Address</label>
              <label class="global-content-typography-subtext"
                style="font-size: smaller; color:var(--global-color-primary-orange)" for="email">REQUIRED</label>
            </div>
            <input class="global-content-typography-text" type="text" id="email" name="email" required>
            <span id="error-email" class="global-content-typography-subtext"
              style="color: var(--global-color-danger); display:none;">&#10060; Please use a valid email address,
              such as user@example.com</span>
          </div>
        </td>
        <td>
          <div class="form-items global-flex-column-wrapper">
            <label class="global-content-typography-text" for="phone_num">Phone Number</label>
            <input class="global-content-typography-text" type="text" id="phone_num" name="phone_num">
            <span id="error-phone-num" class="global-content-typography-subtext"
              style="color: var(--global-color-danger); display:none;">&#10060; Please enter a valid phone
              number</span>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <div class="form-items global-flex-column-wrapper">
            <div class="global-flex-row-wrapper" style="justify-content: space-between;">
              <label class="global-content-typography-text" for="message">Message / Questions</label>
              <label class="global-content-typography-subtext"
                style="font-size: smaller; color:var(--global-color-primary-orange)" for="email">REQUIRED</label>
            </div>
            <textarea class="global-content-typography-text" rows="6" id="message" name="message" required></textarea>

          </div>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <div class="form-items">
            <input type="submit" name="SUBMIT" value="SEND" class="global-button">
          </div>
        </td>
      </tr>
    </table>
  </form>
  <!-- FAQ Section -->
  <header class="contact-us global-content-wrapper  global-flex-column-wrapper">
    <span class="global-content-typography-title">FAQs</span>
    <hr class="global-horizontal-line" width="70px">
  </header>
  <div class="global-content-wrapper">
    <div class="faq global-flex-column-wrapper">
      <span class="global-content-typography-text">Have a question about ordering, shipping, or our process? Search
        our FAQs below! </span>
      <?php include '../../../components/support-page/faq-component.php'; ?>

      <?php echo createComponent(1, "Can I return my items?", "We get it, sometimes something just doesn't work for you and you want your money back. Don't worry, as long as an item is still in its original condition, we accept returns, subject to the rules below, which includes rules around fair use. None of these rules affect your statutory rights.") ?>

      <?php echo createComponent(2, "What if my item arrived damaged?", "Each item is checked for quality before being shipped to you. If your item happens to arrive damaged, contact us at urbantouch@gmail.com and we will be happy to look into options! Incidents must be reported within 30 days of delivery. <br><br>Please keep in mind Urban Touch is not responsible for damages after the tags are removed and the product is worn.") ?>

      <?php echo createComponent(3, "Can I track the delivery of my order?", "If your order has been sent to you using a trackable service, you can follow its journey to you. You'll receive a shipping confirmation email from our warehouse once your order is on its way; simply click on your tracking link on this email to view the up to date tracking.") ?>

      <?php echo createComponent(4, "Can I cancel my order after I've placed it?", "If you've paid for your order, you won't be able to cancel your order. Hence, the solution would be to return your items (refer to question 1), and your money will be refunded in 30 days.") ?>

      <?php echo createComponent(5, "When will my order be shipped?", "We will ship the item within the same day that the order is placed. If the order checkout timing is beyond 7PM, then the item will be shipped out on the next working day. <br><br> The shipping speed varies and can be selected at checkout. Our standard ground shipping takes between 5-7 business days.") ?>

      <span class="global-content-typography-text">If you have any other questions that are not listed in the FAQs
        above, feel free to drop us an inquiry using the Contact Us form above! Alternatively, you can also send your
        questions to <a href="mailto:urbantouch@gmail.com">urbantouch@gmail.com</a> and we will get back to you ASAP.
      </span>

    </div>
  </div>

  <!-- Footer -->
  <?php include '../../../components/footer/php/index.php' ?>
  <script>
  // FAQ
  function handleClick() {
    let id = "content" + event.target.id;
    if (!(document.getElementById(id).style.display == "none")) {
      document.getElementById(id).style.display = "none";
      document.getElementById(event.target.id).innerHTML = "&#43;";
    } else {
      document.getElementById(id).style.display = "unset";
      document.getElementById(event.target.id).innerHTML = "&#10539;";
    }

  }

  // Form validator
  let valid = 1;

  const firstName = document.querySelector("input[name='first_name']");
  firstName.addEventListener("focusout", (event) => {
    if (firstName.value && (!validateName(event.target.value))) {
      firstName.classList.add("input-danger");
      document.getElementById('error-first-name').style.display = "unset";
      valid = 0;
    } else {
      firstName.classList.remove("input-danger");
      document.getElementById('error-first-name').style.display = "none";
      valid = 1
    }
  });

  const lastName = document.querySelector("input[name='last_name']");
  lastName.addEventListener("focusout", (event) => {
    if (lastName.value && (!validateName(event.target.value))) {
      lastName.classList.add("input-danger");
      document.getElementById('error-last-name').style.display = "unset";
      valid = 0;
    } else {
      lastName.classList.remove("input-danger");
      document.getElementById('error-last-name').style.display = "none";
      valid = 1
    }
  });

  const phoneNum = document.querySelector("input[name='phone_num']");
  phoneNum.addEventListener("focusout", (event) => {
    if (phoneNum.value && (!validateNum(event.target.value))) {
      phoneNum.classList.add("input-danger");
      document.getElementById('error-phone-num').style.display = "unset";
      valid = 0;
    } else {
      phoneNum.classList.remove("input-danger");
      document.getElementById('error-phone-num').style.display = "none";
      valid = 1
    }
  });

  const email = document.querySelector("input[name='email']");
  email.addEventListener("focusout", (event) => {
    if (email.value && (!validateEmail(event.target.value))) {
      email.classList.add("input-danger");
      document.getElementById('error-email').style.display = "unset";
      valid = 0;
    } else {
      email.classList.remove("input-danger");
      document.getElementById('error-email').style.display = "none";
      valid = 1
    }
  });

  function validateNum(num) {
    let pattern = /^([(]|[+]){0,1}[+]{0,1}[0-9-()\s]+$/;
    return pattern.test(num);
  }

  function validateName(name) {
    let pattern = /^[A-Za-z\s]+$/;
    return pattern.test(name);
  }

  function validateEmail(email) {
    let pattern = /^^[a-zA-Z0-9-_.]+@(\w+\.){1,3}\w{2,3}$/;
    return pattern.test(email);
  }

  function validateForm() {
    if (valid == 0) {
      return false;
    }
    return true;
  }
  </script>
</body>

</html>