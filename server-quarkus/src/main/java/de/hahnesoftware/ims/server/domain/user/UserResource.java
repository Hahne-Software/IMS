package de.hahnesoftware.ims.server.domain.user;

import org.eclipse.microprofile.graphql.*;

import javax.inject.Inject;
import java.util.List;
import java.util.stream.Collectors;

@GraphQLApi
public class UserResource {
    @Inject
    UserService userService;

    @Query("allUsers")
    @Description("Get all users despite their status")
    public List<User> getAllUsers() {
        return userService.getAllUsers();
    }

    @Query("activeUsers")
    @Description("Get all active users")
    public List<User> getActiveUsers() {
        return userService.getAllUsers().stream().filter(user -> user.status == UserStatus.ACTIVE).collect(Collectors.toList());
    }

    @Query("getUser")
    @Description("Get a user by id")
    public User getUserById(@Name("userId") Long id) {
        return userService.getUserById(id);
    }

    @Mutation("createUser")
    public User createUser(User user) {
        return userService.createUser(user);
    }
}