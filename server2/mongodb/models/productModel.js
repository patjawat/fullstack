var mongose = require('mongoose');

var productSchema = mongose.Schema({
    name: { type: String, require: true },
    price: { type: String, require: true },
    qty: { type: String, require: true },
    barcode: { type: String, require: true }
});

var productModel = mongose.model('product',productSchema);
module.exports = productModel;