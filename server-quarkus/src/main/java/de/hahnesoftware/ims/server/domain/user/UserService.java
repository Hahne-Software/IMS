package de.hahnesoftware.ims.server.domain.user;

import javax.enterprise.context.ApplicationScoped;
import javax.inject.Inject;
import javax.transaction.Transactional;
import java.util.ArrayList;
import java.util.List;

@ApplicationScoped
public class UserService {
    @Inject
    UserRepository userRepository;

    public UserService() {

    }

    public List<User> getAllUsers() {
        return this.userRepository.listAll();
    }

    public User getUserById(Long id) {
        return this.userRepository.findById(id);
    }

    public User getUserByEmail(String email) {
        return this.userRepository.findByEmail(email);
    }

    @Transactional
    public User createUser(User user) {
        user.status = UserStatus.ACTIVE;
        this.userRepository.persist(user);
        return user;
    }
}
