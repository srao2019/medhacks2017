CREATE DATABASE patientDB;

CREATE TABLE PatientInfo(
  PersonID int,
  LastName varchar(255),
  FirstName varchar(255),
  Address varchar(255),
  City varchar(255),
  DateofBirth date
);

CREATE TABLE PatientVitals(
  TimeStamp date
  PulseRate int,
  SystolicBP int,
  DiastolicBP int,
  OxygenSaturation, int
  Temperature int,
  Notes varchar(255)
);

CREATE TABLE PatientRisks(
  Age int,
  Diabetic varchar(255),
  HistoryOfHeartDisease varchar(255)
);
