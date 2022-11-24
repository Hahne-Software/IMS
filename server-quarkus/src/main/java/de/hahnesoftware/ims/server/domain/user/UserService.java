package de.hahnesoftware.ims.server.domain.user;

import javax.enterprise.context.ApplicationScoped;
import java.util.ArrayList;
import java.util.List;

@ApplicationScoped
public class UserService {

    private List<User> users = new ArrayList<>();

    public UserService() {
        User user1 = new User();
        user1.firstName = "John";
        user1.lastName = "Doe";
        user1.email = "doe@example.com";
        user1.status = UserStatus.ACTIVE;

        users.add(user1);

        User user2 = new User();
        user2.firstName = "Jane";
        user2.lastName = "Doe";
        user2.email = "jane@example.com";
        user2.status = UserStatus.INACTIVE;

        users.add(user2);
    }

    public List<User> getAllUsers() {
        return users;
    }

    public User getUserById(int id) {
        return users.get(id);
    }

    public User getUserByEmail(String email) {
        return users.stream().filter(user -> user.email.equals(email)).findFirst().orElse(null);
    }

    public User createUser(User user) {
        users.add(user);
        return user;
    }
}
