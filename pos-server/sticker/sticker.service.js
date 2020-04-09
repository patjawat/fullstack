
const knex = require('../_helpers/knex/pg');


module.exports = {
    getAll:function(){
        return knex('sticker');
    },
    create:function(data){
        return knex('sticker').insert(data);
    }
}