package de.hahnesoftware.ims.server.domain.user;

import io.quarkus.hibernate.orm.panache.PanacheEntity;

import javax.persistence.Entity;

@Entity(name = "users")
public class User extends PanacheEntity {

    public String username;

    public String email;

    public String password;

    public String salt;

    public String firstName;

    public String lastName;

    public UserStatus status;
}