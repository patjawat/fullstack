'use strict';
module.exports = (sequelize, DataTypes) => {
  const patient = sequelize.define('patient', {
    fullname: DataTypes.STRING
  }, {});
  patient.associate = function(models) {
    // associations can be defined here
  };
  return patient;
};