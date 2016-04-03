package api;

import java.util.ArrayList;
import java.util.List;

public class Customer {

  //Information of the customer
  public String _id;
  public String last_name;
  public Address address;
  public String first_name;
  private List<Account> accounts = new ArrayList<Account>();

  Customer(String _id, String first_name, String last_name, String street_number, 
      String street_name, String city, String state, String zip) {
    this._id = _id;
    this.first_name = first_name;
    this.last_name = last_name;
    this.address = new Address(street_number, street_name, city, state, zip);
    this.accounts = new ArrayList<Account>();
  }

  public int numberAccounts() {
    if (this.accounts == null) {
      return 0;
    } else {
    return this.accounts.size();
    }
  }
  
  public void addAccount(Account account) {
    if (this.accounts == null) {
      this.accounts = new ArrayList<Account>();
    }
    this.accounts.add(account);
  }
  
  public List<Account> getAccounts() {
    return accounts;
  }

}