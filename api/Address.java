package api;

public class Address {

  public String city;
  public String street_name;
  public String zip;
  public String state;
  public String street_number;
  
  Address(String street_number, String street_name, String city, String state, 
      String zip) {
    this.street_number = street_number;
    this.street_name = street_name;
    this.city = city;
    this.state = state;
    this.zip = zip;
  }

}
