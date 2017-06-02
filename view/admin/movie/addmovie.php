<div class="detailcolumn addlayout" height='700px'>
  <form class="" action="?controller=movie&action=submitmovie" method="post" enctype="multipart/form-data" >
          <table>
           <tr>
                <td>Title:</td><td><input type="text" name="title" value="" required></td>
           </tr>
           <tr>
                <td>Genre:</td><td><input type="text" name="genre" value="" required></td>
           </tr>
           <tr>
                <td>Director:</td><td><input type="text" name="director" value="" required></td>
           </tr>
           <tr>
                <td>MPAA Rating:</td>
                <td>
                  <select class="" name="rating">
                    <option value="G">G</option>
                    <option value="PG">PG</option>
                    <option value="PG-13">PG-13</option>
                    <option value="R">R</option>
                    <option value="NC-17">NC-17</option>
                  </select>
                  <!-- <input type="text" name="rating" value="" required> -->
                </td>
           </tr>
           <tr>
                <td>Image:</td><td><input type="file" name="fileToUpload" required></td>
           </tr>
           <tr>
                <td>Description:</td><td><input type="text" name="description" value="" required></td>
           </tr>
           <tr>
                <td>Length in Min:</td><td><input type="number" name="length_in_min" value="" required></td>
           </tr>
           <tr>
                <td>Release Date:</td><td><input type="date" name="release_date" value="" required></td>
           </tr>
           <tr>
                <td>Ticket Price:</td><td><input type="number" min='0.00' max='10000.00' name="price" value="" required></td>
           </tr>
          </table>


          <input type="submit" name="" value="Submit">
  </form>
</div>
