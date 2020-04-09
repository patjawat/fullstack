<template>
    <div>
            <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-white"> รายการทรัพย์สินย์ <small>Example 3.0</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#" class="text-white">Home</a></li>
              <li class="breadcrumb-item"><a href="#" class="text-white">Layout</a></li>
              <li class="breadcrumb-item active text-white">Top Navigation</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <h1>{{dialog}}</h1>

    <div class="text-center">
      <v-dialog
        v-model="dialog"
        width="500"
      >
        <template v-slot:activator="{ on }">
          <v-btn
            color="red lighten-2"
            dark
            v-on="on"
          >
            Click Me
          </v-btn>
        </template>
  
        <v-card>
          <v-card-title
            class="headline grey lighten-2"
            primary-title
          >
            Privacy Policy
          </v-card-title>
  
          <v-card-text>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </v-card-text>
  
          <v-divider></v-divider>
  
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn
              color="primary"
              text
              @click="dialog = false"
            >
              I accept
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </div>
  
<form class="form-inline mb-3">
  <div class="form-group mr-3" style="width:40%">
    <label for="inputPassword2" class="sr-only">Password</label>
    <input type="text" class="form-control" placeholder="ค้นหา .." style="width:100%">
  </div>
  <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> สร้างใหม่</button>
</form>

<div class="card card-widget shadow mb-3 bg-white rounded collapse-card collapsed-card" v-for="index in 100" :key="index">
              <div class="card-header">
                <div class="user-block">
                  <img class="img-circle" src="/dist/img/user1-128x128.jpg" alt="User Image">
                  <span class="username"><a href="#">Computer NoteBook</a></span>
                  <span class="description">4770-0002-001-1</span>
                </div>
                <!-- /.user-block -->
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Mark as read">
                    <i class="far fa-circle"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"  aria-expanded="false"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- post text -->
                <p>Far far away, behind the word mountains, far from the
                  countries Vokalia and Consonantia, there live the blind
                  texts. Separated they live in Bookmarksgrove right at</p>
                <!-- Attachment -->
                <div class="attachment-block clearfix">
                  <img class="attachment-img" src="/dist/img/photo1.png" alt="Attachment Image">

                  <div class="attachment-pushed">
                    <h4 class="attachment-heading"><a href="http://www.lipsum.com/">Lorem ipsum text generator</a></h4>

                    <div class="attachment-text">
                      Description about the attachment can be placed here.
                    </div>
                    <!-- /.attachment-text -->
                  </div>
                  <!-- /.attachment-pushed -->
                </div>
                <!-- /.attachment-block -->

                <!-- Social sharing buttons -->
                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
                <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
                <span class="float-right text-muted">45 likes - 2 comments</span>
              </div>
              <!-- /.card-body -->
              <div class="card-footer card-comments">
                <!-- /.card-comment -->
                <div class="card-comment">
                  <!-- User image -->
                  <img class="img-circle img-sm" src="/dist/img/user5-128x128.jpg" alt="User Image">

                  <div class="comment-text">
                    <span class="username">
                      Nora Havisham
                      <span class="text-muted float-right">8:03 PM Today</span>
                    </span><!-- /.username -->
                    The point of using Lorem Ipsum is that it hrs a morer-less
                  </div>
                  <!-- /.comment-text -->
                </div>
                <!-- /.card-comment -->
              </div>
              <!-- /.card-footer -->
              <div class="card-footer">
                <form action="#" method="post">
                  <img class="img-fluid img-circle img-sm" src="/dist/img/user4-128x128.jpg" alt="Alt Text">
                  <!-- .img-push is used to add margin to elements next to floating images -->
                  <div class="img-push">
                    <input type="text" class="form-control form-control-sm" placeholder="Press enter to post comment">
                  </div>
                </form>
              </div>
              <!-- /.card-footer -->
            </div>

            </div>

</template>

<script>
    export default {
        data () {
    return {
      dialog: false,
    }
  },
    }
</script>

<style lang="scss" scoped>

</style>