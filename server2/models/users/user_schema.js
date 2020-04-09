var mongose = require('mongoose');

var userSchema = mongose.Schema({
    username: { type: String, require: true },
    password: { type: String, require: true }
});

var userModel = mongose.model('users',userSchema);
module.exports = userModel;