const express = require("express"),
  app = express(),
  cors = require('cors')
passport = require("passport"),
  port = process.env.PORT || 4000,
  pg = require("pg"),
  connectionString = process.env.DATABASE_URL || "postgres://postgres:admin@localhost:5432/todo",
  app.use(cors())

require('./mogoConnect.js.js');
const userSchema = require('./models/users/user_schema');

// Set Parses JSON
app.use(express.json());
const mongoRoute = require('./mongodb/routes/mongoRoutes');

require("./configs/passport");
app.set("json spaces", 2);
app.get("/", (req, res, next) => {
  const results = [];
  pg.connect(connectionString, (err, client, done) => {
    if (err) {
      done();
      console.log(err);
      return res.status(500).json({ success: false, data: err });
    }
    const query = client.query("SELECT * FROM product ORDER BY id ASC;");
    query.on("row", row => {
      results.push(row);
    });
    query.on("end", () => {
      done();
      return res.json(results);
    });
  });
});

app.get('/api', (req, res, next) => {
  userSchema.find((err,doc) => {
    if (err) {
      res.json({ result: "false" });
      console.log(err);
    } else {
      res.json({ result: "success", data:doc});
    }
  });
});


app.post('/api', (req, res, next) => {
  userSchema.create(req.body, (err) => {
    if (err) {
      res.json({ result: "false" });
      console.log(err);
    } else {
      res.json({ result: "success", username: req.body.username });
    }
  });
});

app.put('/api/id',()=>{
  // Find customer and update it
  userSchema.findByIdAndUpdate(req.body._id, req.body, {new: true})
  .then(customer => {
      if(!customer) {
          return res.status(404).json({
              msg: "Customer not found with id " + req.params.customerId
          });
      }
      res.json(customer);
  }).catch(err => {
      if(err.kind === 'ObjectId') {
          return res.status(404).json({
              msg: "Customer not found with id " + req.params.customerId
          });                
      }
      return res.status(500).json({
          msg: "Error updating customer with id " + req.params.customerId
      });
  });
});


app.delete('/api/:id', (req, res, next) => {

  userSchema.findByIdAndRemove(req.params.id)
  .then(userSchema => {
      if(!userSchema) {
          return res.status(404).json({
              msg: "not found with id " + req.params.id
          });
      }
      res.json({ result: "success",msg: "Customer deleted successfully!" });
  }).catch(err => {
      if(err.kind === 'ObjectId' || err.name === 'NotFound') {
          return res.status(404).json({
              msg: "not found with id " + req.params.id
          });                
      }
      return res.status(500).json({
          msg: "Could not delete userSchema with id " + req.params.id
      });
  });
  
});




// Routes
mongoRoute(app)
app.use("/auth", require("./routes/auth"));
app.use(
  "/user",
  passport.authenticate("jwt", { session: false }),
  require("./routes/user")
);


app.get('/mongo', (req, res, next) => {
  userSchema.create(req.body, (err) => {
    if (err) {
      res.json({ result: "false" });
      console.log(err);
    } else {
      res.json({ result: "success", username: req.body.username });
    }
  });
});



// Error Handler
app.use((err, req, res, next) => {
  let statusCode = err.status || 500;
  res.status(statusCode);
  res.json({
    error: {
      status: statusCode,
      message: err.message
    }
  });
});

// Start Server
app.listen(port, () => console.log(`Server is running on port ${port}`));
