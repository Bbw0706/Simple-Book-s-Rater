<?php 
  if (isset($_POST['submit'])) {
    session_start();
    $_SESSION['POST'] = $_POST;
    
    $name =  $_POST['bookName'];
    $category = $_POST['bookCategory'];
    $rating = $_POST['rating'];
    $to = "victor@acejob.io";
    
    $msg = 'Book Name ' . $name . ' Book Category ' . $category . ' and the Rating is ' . $rating;
    $header = "From: noreply@example.com\r\n"; 
    $header.= "MIME-Version: 1.0\r\n"; 
    $header.= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
    $header.= "X-Priority: 1\r\n";
    
    mail($to, "The result", wordwrap($msg));

    header('Location: library.php');
  } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Home</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.2/themes/bars-square.css">
  <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
  <main id="app">
    <section class="custom-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-lg-6 mb-5">
            <div class="carousels">
              <div>
                <img class="img-fluid custom-img" src="./assets/img/undraw_insert_block_efyb.svg" alt="">
              </div>
              <div>
                <img class="img-fluid custom-img" src="./assets/img/undraw_predictive_analytics_kf9n.svg" alt="">
              </div>
              <div>
                <img class="img-fluid custom-img" src="./assets/img/undraw_tree_swing_ub4f.svg" alt="">
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-lg-6">
            <form @submit="submitData($event)" method="POST" class="custom-form">
              <div class="form-group">
                <label for="bookName">Book Name</label>
                <input
                  list="bookname"
                  type="text"
                  class="form-control"
                  v-model="bookName"
                  id="bookName"
                  name="bookName"
                  placeholder="Search Book's Name"
                >
                <datalist id="bookname">
                  <option>Start With Why</option>
                  <option>Start to Lead</option>
                  <option>Start Simple Idea</option>
                  <option>Start Crushing It!</option>
                </datalist>
              </div>
              <div class="form-group">
                <label for="bookCategory">Book Category</label>
                <select class="custom-select" v-model="bookCategory" name="bookCategory">
                  <option value="" selected disabled>Search Book's Category</option>
                  <option value="Business">Business</option>
                  <option value="Technology">Technology</option>
                  <option value="Art">Art</option>
                </select>
              </div>
              <div class="rate text-center mt-5">
                <p>How you gonna rate this Book's ?</p>
                <select id="rateBook" v-model="rating" ref="ratings" name="rating">
                  <option value=""></option>
                  <option value="1" data-html="1">1</option>
                  <option value="2" data-html="2">2</option>
                  <option value="3" data-html="3">3</option>
                  <option value="4" data-html="4">4</option>
                  <option value="5" data-html="5">5</option>
                  <option value="6" data-html="6">6</option>
                  <option value="7" data-html="7">7</option>
                  <option value="8" data-html="8">8</option>
                  <option value="9" data-html="9">9</option>
                  <option value="10" data-html="10">10</option>
                </select>

              </div>
              <div class="button-wrapper text-center">
                <button
                  type="button"
                  class="btn btn-default custom-button white-button"
                  @click="resetState"
                >
                  Reset
                </button>
                <button type="submit" name="submit" class="btn btn-default custom-button">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>
  
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.2/jquery.barrating.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="./assets/js/carousels.js"></script>
  
  <script>
    const App = new Vue({
      el: '#app',
      data() {
        return {
          bookName: '',
          bookCategory: '',
          rating: '',
        };
      },
      methods: {
        resetState() {
          this.bookName = '',
          this.bookCategory = ''
          this.rating = ''
          $('#rateBook').barrating('clear');
        },
        submitData(e) {
          const { bookName, bookCategory } = this;
          const rating = $('.br-current-rating').text();
          console.log(rating === '')
          if (rating === '' || this.bookName === '' || this.bookCategory === '') {
            swal("Please filled the form");
            e.preventDefault();
          }
        },
      },
    })
  </script>
</body>
</html>