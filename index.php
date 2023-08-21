<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./style.css" />
    <title>form</title>
  </head>
  <body>
    <fieldset>
      <legend>Contact Us</legend>
      <form action="submit.php" method="post" id="contact">
        <table class="personal-info">
          <tr>
            <td><label for="name">Name:</label></td>
            <td>
              <input
                type="text"
                id="name"
                name="name"
                placeholder=" Full Name"
                class="input-width"
              />
            </td>
          </tr>
          <tr>
            <td><label for="phone-no">Phone:</label></td>
            <td>
              <input
                type="text"
                id="phone-no"
                name="phone-no"
                placeholder=" Phone Number"
                class="input-width"
              />
            </td>
          </tr>
          <tr>
            <td><label for="email">Email:</label></td>
            <td>
              <input
                type="email"
                id="email"
                name="email"
                placeholder=" Email"
                class="input-width"
              />
            </td>
          </tr>
        </table>

        <table class="message">
          <tr>
            <td><h4>Your Message</h4></td>
          </tr>
          <tr>
            <td>
              <input
                type="text"
                id="subject"
                placeholder="Subject"
                class="input-width"
              />
            </td>
          </tr>
          <tr>
            <td>
              <textarea
                id="message"
                cols="55"
                rows="15"
                placeholder=" Type You Message here........."
              ></textarea>
            </td>
          </tr>
        </table>
        <table class="submit">
         <tr>
          <td> <button id="">Submit</button></td>
         </tr>
        </table>
      </form>
    </fieldset>
  </body>
</html>

