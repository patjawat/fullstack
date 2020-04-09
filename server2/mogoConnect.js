  // คำสั่งเชื่อม MongoDB Atlas
  const   mongoose = require("mongoose");
  const options = {
    user: 'root',
    pass: 'admin'
  };
  
  var mongo_uri = "mongodb://localhost:27017/product";
  mongoose.Promise = global.Promise;
  mongoose.connect(mongo_uri, { useNewUrlParser: true }).then(
    () => {
      console.log("[success] task 2 : connected to the database ");
    },
    error => {
      console.log("[failed] task 2 " + error);
      process.exit();
    }
  );