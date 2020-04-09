

const knex = require('../_helpers/knex/mysql');

module.exports = {
        getAll:function(){
            return knex('product');
        },
        getOne:function(id){
            return knex('product').where('id',id);
        },
        create:function(data){
            return knex('product').insert(data).returning('*');
        },
        update:function(id,data){
            return knex('product').where('id',id).update(data,'*');
        },
        del:function(id,data){
            return knex('product').where('id',id).del();
        }

    
}